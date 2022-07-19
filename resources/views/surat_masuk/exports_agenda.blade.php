<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agenda Surat Masuk</title>
</head>

<body>
    <table>
        <thead>
            <tr>
                <td colspan="10"><strong>AGENDA SURAT MASUK</strong></td>
            </tr>
            <tr>
                <td colspan="10"><strong>{{$instansi->nama}}</strong></td>
            </tr>
            <tr>
                <td colspan="10">Alamat : {{$instansi->alamat}}</td>
            </tr>
            <tr>
                <td colspan="10">Email : {{$instansi->email}}</td>
            </tr>
            <tr></tr>
            <tr>
                <td colspan="5">Waktu download : {{$time_download}}</td>
                <td colspan="5">Didownload oleh : {{Auth::user()->name}} ({{Auth::user()->email}})</td>
            </tr>
            <tr></tr>
            <tr>
                <th align="center"><strong>No</strong></th>
                <th align="center"><strong>Tanggal Terima</strong></th>
                <th align="center"><strong>Pengirim</strong></th>
                <th align="center"><strong>Kode Klasifikasi</strong></th>
                <th align="center"><strong>Perihal</strong></th>
                <th align="center"><strong>Nomor Surat</strong></th>
                <th align="center"><strong>Tanggal Surat</strong></th>
                <th align="center"><strong>Isi Ringkas</strong></th>
                <th align="center"><strong>Keterangan</strong></th>
                <th align="center"><strong>Petugas</strong></th>
            </tr>
        </thead>
        <tbody>
            <?php $no = 0; ?>
            @foreach($data_surat_masuk as $surat_masuk)
            <?php $no++; ?>
            <tr>
                <td align="center">{{ $no }}</td>
                <td>{{ date('d-M-Y', strtotime($surat_masuk->created_at))}}</td>
                <td>{{ $surat_masuk->asal_surat }}</td>
                <td align="center">{{ $surat_masuk->klasifikasis->kode }}</td>
                <td>{{ $surat_masuk->klasifikasis->nama }}</td>
                <td>{{ $surat_masuk->nomor_surat }}</td>
                <td>{{ date('d-M-Y', strtotime($surat_masuk->tanggal_surat))}}</td>
                <td>{{ $surat_masuk->isi_surat }}</td>
                <td>{{ $surat_masuk->keterangan }}</td>
                <td>{{ $surat_masuk->users->name }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>