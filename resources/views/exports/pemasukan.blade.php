<table>
    <thead>
        <tr>
           <th>No</th>
           <th>Jenis Pemasukan</th>
           <th>Nama Siswa</th>
           <th>Kelas</th>
           <th>Tahun Ajaran</th>
           <th>Uraian</th>
           <th>Jumlah</th>
           <th>Tanggal</th>
           <th>Dibuat / Diterima</th>
        </tr>
    </thead>
    <tbody>
        @foreach($pemasukans as $siswa)
        <tr>
            <td>
         
{{ $loop->iteration }}
      
            </td>
            <td>

{{ $siswa->kategori->name }}
            </td>
            <td>

{{ $siswa->siswa->nama }}
            </td>
            <td>


                   {{ $siswa->siswa->kelas }}

            </td>

            <td>
        
{{ $siswa->siswa->tahun_ajaran }}
      
            </td>
            <td>
        
{{ $siswa->uraian }}
      
            </td>
            <td>
        
{{ $siswa->jumlah }}
      
            </td>
            <td>
        
{{ $siswa->created_at }}
      
            </td>
            <td>
        
{{ $siswa->user->name }}
      
            </td>

          </tr>
          @endforeach

    </tbody>
</table>