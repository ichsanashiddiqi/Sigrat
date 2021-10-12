<div>
<h3>KEMENTRIAN PERTANIAN</h3>
<h1>SUB UPG</h1>
<h3>SUB PENGELOLA UNIT GRATIFIKASI</h3>
<h3>UNIT KERJA      :</h3>
<h3>REKAPITULASI PENERIMAAN GRATIFIKASI LINGKUP KEMENTRIAN PERTANIAN</h3>
<h3>PERIODE         :</h3>
</div>
<table>
    <thead>
        <tr>
            <th>NO</th>
            <th>JENIS BENTUK GRATIFIKASI</th>
            <th>NAMA PENERIMA GRATIFIKASI</th>
            <th>NILAI EQUIVALENT</th>
            <th>TANGGAL PENERIMAAN PEMBERIAN</th>
            <th>LOKASI PEMBERIAN</th>
            <th>PEMBERI GRATIFIKASI</th>
            <th>HUBUNGAN DENGAN PEMBERI GRATFIKASI</th>
            {{-- <th>Aksi</th> --}}
        </tr>
    </thead>
    <tbody>
        @php $no = 1 @endphp
        @foreach ($data as $item)
        @if ($item->laporan)
                                                        <tr>
                                                            <td>{{ $no++ }}</td>
                                                            <td>{{ $item->laporan->jenis_gratifikasi }},
                                                                {{ $item->laporan->bentuk_gratifikasi }}</td>
                                                            <td>{{ $item->user->nama }}, {{ $item->user->nip }},
                                                                {{ $item->user->jabatan }}, Gol. /ruang:
                                                                {{ $item->laporan->golongan }}</td>
                                                            <td>{{ $item->laporan->nilai_equivalent }}</td>
                                                            <td>{{ $item->laporan->tanggal_pemberian }}</td>
                                                            <td>{{ $item->laporan->tempat }}</td>
                                                            <td>{{ $item->laporan->pemberi->nama }},
                                                                {{ $item->laporan->pemberi->alamat }},
                                                                {{ $item->laporan->pemberi->telepon }}</td>

                                                            @if ($item->laporan->waktu_pelaksanaan)
                                                                <td>{{ $item->laporan->hubungan_pemberi }},
                                                                    {{ $item->laporan->waktu_pelaksanaan }}</td>
                                                            @else
                                                                <td>{{ $item->laporan->hubungan_pemberi }}</td>
                                                            @endif
                                                        </tr>
                                                        @endif
        @endforeach
    </tbody>
</table>