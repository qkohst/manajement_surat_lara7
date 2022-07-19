<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>{{$title}} <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?></title>
    <link href="dist/css/invoice.css" rel="stylesheet">
</head>

<body>
    <!-- Page 1  -->
    <div class="invoice-box">
        <table cellpadding="0" cellspacing="0">
            <tr class="top">
                <td colspan="5">
                    <table>
                        <tr>
                            <td class="title">
                                <img src="dist/img/logo/{{$instansi->logo}}" style="width: 80px" />
                            </td>
                            <td>
                                <strong>{{$instansi->nama}}</strong> <br>
                                Alamat : {{$instansi->alamat}} <br>
                                Email:{{$instansi->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr class="top">
                <td colspan="5" style="text-align:center; margin-bottom:5px">
                    <strong>{{$title}}</strong>
                </td>
            </tr>
        </table>

        <table>

            <tr class="heading">
                <td align="center">No</td>
                <td align="center">Tgl Terima</td>
                <td align="center">Pengirim</td>
                <td align="center">Kode</td>
                <td align="center">Perihal</td>
                <td align="center">No. Surat</td>
                <td align="center">Tgl Surat</td>
                <td align="center">Isi Ringkas</td>
                <td align="center">Keterangan</td>
                <td align="center">Petugas</td>
            </tr>

            <?php $no = 0; ?>
            @foreach($data_surat_masuk as $surat_masuk)
            <?php $no++; ?>
            <tr class="item">
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
        </table>
    </div>

    <script language="javascript">
        var today = new Date();
        document.getElementById('time').innerHTML = today;
    </script>
</body>

</html>