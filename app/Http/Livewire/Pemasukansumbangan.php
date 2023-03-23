<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\kategori;
use Livewire\WithPagination;
use App\Models\Pemasukan;
use App\Models\Pengeluaran;
use App\Models\siswa;
use App\Exports\SumbanganExport;
use App\Models\departemen;
use Maatwebsite\Excel\Facades\Excel;

class Pemasukansumbangan extends Component
{

    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    public $paginate = 10;
    public $kategori, $tanggal, $search;
    public $departemen;
    public $role_sumbangan;
    public $pemasukans;
    public $pemasukans_edit;
    public $pembayaran;
    public $siswa_id, $jumlah, $uraian, $jenis_sumbangan, $nama_penyumbang, $nama_penyumbang_siswa, $pemasukan_delete_id, $pemasukan_edit_id;
    public $updateMode = false;
    public $view_nama, $view_kelas, $view_tahun_ajaran, $view_username, $view_tanggal, $view_all, $view_jenis_sumbangan, $view_jumlah, $view_uraian, $view_nama_penyumbang;

    public function mount(kategori $kategori, departemen $departemen)
    {
        $this->pembayaran = $kategori;
        $this->departemen = $departemen;
    }

    public function editStudents($id)
    {
        $pemasukan = Pemasukan::where('id', $id)->first();

        $this->siswa_id = $pemasukan->siswa_id;
        $this->jumlah = $pemasukan->jumlah;
        $this->uraian = $pemasukan->uraian;
        $this->nama_penyumbang = $pemasukan->nama_penyumbang;
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
            'jenis_sumbangan' => 'required',
            'uraian' => 'required',
        ]);

        $pemasukan = Pemasukan::where('id', $this->pemasukan_edit_id)->first();

        $pemasukan->siswa_id = $this->siswa_id;
        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->uraian = $this->uraian;
        $pemasukan->jenis_sumbangan = $this->jenis_sumbangan;
        $pemasukan->nama_penyumbang = $this->nama_penyumbang_siswa;

        $pemasukan->save();
        $this->resetInputFields();
        session()->flash('message', 'Pemasukan has been updated successfully');
    }

    public function editStudentData2()
    {
        //on form submit validation
        $this->validate([
            'nama_penyumbang' => 'required',
            'jenis_sumbangan' => 'required',
            'jumlah' => 'required',
            'uraian' => 'required',
        ]);

        $pemasukan = Pemasukan::where('id', $this->pemasukan_edit_id)->first();

        $pemasukan->nama_penyumbang = $this->nama_penyumbang;
        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->uraian = $this->uraian;
        $pemasukan->jenis_sumbangan = $this->jenis_sumbangan;


        $pemasukan->save();
        $this->resetInputFields();
        session()->flash('message', 'Pemasukan has been updated successfully');
    }

    public function cancel()
    {
        $this->updateMode = false;
        $this->resetInputFields();
    }

    public function roleSumbangan($id)
    {
        $this->role_sumbangan = $id; //student id

    }

    public function storeStudentData()
    {
        //on form submit validation
        $this->validate([
            'siswa_id' => 'required',
            'jumlah' => 'required',
            'jenis_sumbangan' => 'required',
            'uraian' => 'required',
        ]);


        //Add Student Data
        $pemasukan = new pemasukan();
        $this->nama_penyumbang_siswa = siswa::where('id', $this->siswa_id)->pluck('nama');
        $pemasukan->siswa_id = $this->siswa_id;
        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->nama_penyumbang = $this->nama_penyumbang_siswa;
        $pemasukan->jenis_sumbangan = $this->jenis_sumbangan;
        $pemasukan->uraian = $this->uraian;
        $pemasukan->departemen_id = auth()->user()->departemen_id;
        $pemasukan->kategori_id =  $this->pembayaran->id;
        $pemasukan->user_id = auth()->user()->id;

        $pemasukan->save();
        session()->flash('message', 'Pemasukan Sumbangan Siswa Berhasil Ditambahkan');
        $this->siswa_id = '';
        $this->jumlah = '';
        $this->jenis_sumbangan = '';
        $this->uraian = '';
    }
    public function sumbangan()
    {
        //on form submit validation
        $this->validate([
            'nama_penyumbang' => 'required',
            'jumlah' => 'required',
            'jenis_sumbangan' => 'required',
            'uraian' => 'required',
        ]);


        //Add Student Data
        $pemasukan = new pemasukan();
        $pemasukan->nama_penyumbang = $this->nama_penyumbang;
        $pemasukan->jumlah = $this->jumlah;
        $pemasukan->jenis_sumbangan = $this->jenis_sumbangan;
        $pemasukan->uraian = $this->uraian;
        $pemasukan->departemen_id = auth()->user()->departemen_id;
        $pemasukan->kategori_id =  $this->pembayaran->id;
        $pemasukan->user_id = auth()->user()->id;

        $pemasukan->save();
        session()->flash('message', 'Pemasukan Sumbangan Siswa Berhasil Ditambahkan');
        $this->nama_penyumbang = '';
        $this->jumlah = '';
        $this->jenis_sumbangan = '';
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
        $this->jenis_sumbangan = '';
        $this->uraian = '';
        $this->pemasukan_edit_id = '';
        $this->nama_penyumbang = '';
    }

    public function viewStudentDetails(Pemasukan $pemasukan)
    {
        $this->view_all = $pemasukan->id;
        $this->view_nama = $pemasukan->siswa_id === null ? $pemasukan->nama_penyumbang :  $pemasukan->siswa->nama;
        $this->view_kelas = $pemasukan->siswa_id === null ? "" :  $pemasukan->siswa->kelas;
        $this->view_tahun_ajaran = $pemasukan->siswa_id === null ? "" :  $pemasukan->siswa->tahun_ajaran;
        $this->view_uraian = $pemasukan->uraian;
        $this->view_jumlah = $pemasukan->jumlah;
        $this->view_jenis_sumbangan = $pemasukan->jenis_sumbangan;
        $this->view_username = $pemasukan->user->name;
        $this->view_tanggal = $pemasukan->created_at;
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
        $sumbangan = $this->search === null ?
            pemasukan::where('departemen_id', $this->departemen->id)->where('kategori_id', $this->pembayaran->id)
            ->orderBy("id", "desc")->paginate($this->paginate) :
            pemasukan::where('departemen_id', $this->departemen->id)->where('kategori_id', $this->pembayaran->id)
            ->whereHas('siswa', function ($q) {
                $q->where('nama', 'like', '%' . $this->search . '%');
            })->orWhere('nama_penyumbang', 'like', '%' . $this->search . '%')
            ->paginate($this->paginate);


        $ttl = siswa::where('departemen_id', $this->departemen->id)->where('role_sumbangan', 1)->count();

        $pembayaran = $this->pembayaran;
        $create_namas =   siswa::where('departemen_id', $this->departemen->id)->where('role_sumbangan', 1)->orderBy("id", "desc")->get();
        $hari = pemasukan::where('departemen_id', $this->departemen->id)->where('kategori_id', $this->pembayaran->id)
            ->whereRaw('Date(created_at) = CURDATE()')->sum('jumlah');
        $bulan = pemasukan::where('departemen_id', $this->departemen->id)->where('kategori_id', $this->pembayaran->id)
            ->whereMonth('created_at', '=', date('m'))->sum('jumlah');
        $semua = pemasukan::where('departemen_id', $this->departemen->id)->where('kategori_id', $this->pembayaran->id)
            ->sum('jumlah');
        $ttlpemasukan = pemasukan::where('departemen_id', $this->departemen->id)->sum('jumlah');
        $ttlpengeluaran = Pengeluaran::where('departemen_id', $this->departemen->id)->sum('jumlah');

        return view('livewire.pemasukansumbangan', [
            "sumbangans" => $sumbangan,
            "ttl" =>  $ttl,
            'create_namas' => $create_namas,
            "pembayaran" => $pembayaran,
            'hari' => $hari,
            'bulan' => $bulan,
            "semua" => $semua,
            "ttlpengeluaran" => $ttlpengeluaran,
            "ttlpemasukan" => $ttlpemasukan,
            "kas" => $ttlpemasukan -= $ttlpengeluaran,
        ])->extends('layout.main')->section('container');
    }
    public function export()
    {
        return Excel::download(new SumbanganExport($this->pembayaran->id, $this->departemen->id), 'sumbangan.xlsx');
    }
}
