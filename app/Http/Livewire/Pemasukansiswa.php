<?php

namespace App\Http\Livewire;

use App\Models\kategori;
use Livewire\WithPagination;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\siswa;
use Livewire\Component;
use App\Exports\PemasukansiswaExport;
use App\Exports\SumbanganExport;
use App\Models\departemen;
use App\Models\User;
use Maatwebsite\Excel\Facades\Excel;

class Pemasukansiswa extends Component
{
    
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $paginate = '';
    public $search, $tanggal;
    public $detail;
    public $pemasukans;
    public $dep;
    public $pemasukans_edit;
    public $pembayaran;
    public $siswa_id, $jumlah, $uraian, $pemasukan_delete_id, $pemasukan_edit_id;
    public $updateMode = false;
    public $view_nama, $view_kelas, $view_tahun_ajaran, $view_username, $view_tanggal, $view_all;

    public function mount(kategori $kategori, departemen $departemen)
    {
        $this->pembayaran = $kategori;
        $this->dep = $departemen;
    }


    public function editStudents($id)
    {
        $pemasukan = Pemasukan::where('id', $id)->first();

        $this->siswa_id = $pemasukan->siswa_id;
        $this->jumlah = $pemasukan->jumlah;
        $this->uraian = $pemasukan->uraian;
        $this->pemasukan_edit_id = $id;
        $pemasukan->departemen_id = auth()->user()->departemen_id;
        $pemasukan->user_id = auth()->user()->id;
    }

    public function editStudentData()
    {
        //on form submit validation
        $this->validate([
            'siswa_id' => 'required',
            'jumlah' => 'required',
            'uraian' => 'required',
        ]);

        $pemasukan = Pemasukan::where('id', $this->pemasukan_edit_id)->first();

        $pemasukan->siswa_id = $this->siswa_id;
        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->uraian = $this->uraian;

        $pemasukan->save();
        $this->resetInputFields();
        session()->flash('message', 'Pemasukan has been updated successfully');
    }


    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'siswa_id' => 'required',
            'jumlah' => 'required',
            'uraian' => 'required',
        ]);


        //Add Student Data
        $pemasukan = new pemasukan();
        $pemasukan->siswa_id = $this->siswa_id;

        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->uraian = $this->uraian;
        $pemasukan->departemen_id = auth()->user()->departemen_id;
        $pemasukan->kategori_id =  $this->pembayaran->id;
        $pemasukan->user_id = auth()->user()->id;

        $pemasukan->save();
        session()->flash('message', 'Pemasukan Siswa Berhasil Ditambahkan');
        $this->siswa_id = '';
        $this->jumlah = '';
        $this->uraian = '';
    }


    public function __construct()
    {
        $this->pemasukans = Pemasukan::where('siswa_id', $this->view_all)->orderBy("id", "desc")->get();
    }


    private function resetInputFields()
    {
        $this->siswa_id = '';
        $this->jumlah = '';
        $this->uraian = '';
        $this->pemasukan_edit_id = '';
    }

    public function viewStudentDetails(siswa $siswa)
    {
        $this->pemasukans = $siswa->pemasukan->where('departemen_id', $this->dep->id)->where('kategori_id', $this->pembayaran->id);
        $this->view_all = $siswa->id;
        $this->view_nama = $siswa->nama;
        $this->view_kelas = $siswa->kelas;
        $this->view_tahun_ajaran = $siswa->tahun_ajaran;
        $this->view_username = $siswa->user->name;
        $this->view_tanggal = $siswa->created_at;
    }

    public function deleteConfirmation($id)
    {
        $this->pengeluaran_delete_id = $id; //student id

    }


    public function deleteStudentData()
    {
        $siswa = Pemasukan::where('id', $this->pengeluaran_delete_id)->first();
        $siswa->delete();


        session()->flash('message', 'Pemasukan Berhasil Dihapus');

        $this->pengeluaran_delete_id = '';
    }


    public function render()
    {

        $siswa =
            siswa::with('pemasukan')->where('departemen_id', $this->dep->id)->where('role_sumbangan', 1)
            ->where('nama', 'like', '%' . $this->search . '%')
            ->withSum(['pemasukan' => function ($query) {
                $query
                    ->where('kategori_id', $this->pembayaran->id);
            }], 'jumlah')->paginate($this->paginate);


        $ttl = siswa::where('departemen_id', $this->dep->id)->where('role_sumbangan', 1)->where('role_sumbangan', 1)->count();

        $pembayaran = $this->pembayaran;
        $create_namas =   siswa::where('departemen_id', $this->dep->id)->where('role_sumbangan', 1)->orderBy("id", "asc")->get();
        $hari = pemasukan::where('departemen_id', $this->dep->id)->where('kategori_id', $this->pembayaran->id)->whereHas('siswa', function ($q) {
            $q->where('role_sumbangan', 1);
        })
            ->whereRaw('Date(created_at) = CURDATE()')->sum('jumlah');
        $bulan = pemasukan::where('departemen_id', $this->dep->id)->where('kategori_id', $this->pembayaran->id)->whereHas('siswa', function ($q) {
            $q->where('role_sumbangan', 1);
        })
            ->whereMonth('created_at', '=', date('m'))->sum('jumlah');
        $semua = pemasukan::where('departemen_id', $this->dep->id)->where('kategori_id', $this->pembayaran->id)->whereHas('siswa', function ($q) {
            $q->where('role_sumbangan', 1);
        })
            ->sum('jumlah');

        $ttlpemasukan = pemasukan::where('departemen_id', $this->dep->id)->sum('jumlah');
        $ttlpengeluaran = Pengeluaran::where('departemen_id', $this->dep->id)->sum('jumlah');

        return view('livewire.pemasukansiswa', [
            "siswas" => $siswa,
            "ttl" =>  $ttl,
            'detail' => $this->detail,
            'create_namas' => $create_namas,
            "pembayaran" => $pembayaran,
            'hari' => $hari,
            'bulan' => $bulan,
            "semua" => $semua,
            "ttlpengeluaran" => $ttlpengeluaran,
            "kas" => $ttlpemasukan -= $ttlpengeluaran,
            "ttlpemasukan" => $ttlpemasukan,
        ])->extends('layout.main')->section('container');
    }
    public function export()
    {
        return Excel::download(new SumbanganExport($this->pembayaran->id, $this->dep->id), 'pemasukan.xlsx');
    }
}
