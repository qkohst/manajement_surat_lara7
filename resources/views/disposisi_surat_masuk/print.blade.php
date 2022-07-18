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
                                <strong>{{$instansi->nama}}</strong><br />
                                Alamat : {{$instansi->alamat}} Email:{{$instansi->email}}
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>

            <tr>
                <td colspan="5" style="text-align: center">
                    <br>
                    <strong>LEMBAR {{$title}}</strong>
                </td>
            </tr>
            <br>
        </table>

        <table>
            <tr class="details">
                <td>Kode Klasifikasi</td>
                <td>:</td>
                <td>{{$disposisi->surat_masuks->klasifikasis->kode}} | {{$disposisi->surat_masuks->klasifikasis->nama}}</td>
            </tr>
            <tr class="details">
                <td>Tanggal Surat</td>
                <td>:</td>
                <td>{{date('d-M-Y', strtotime($disposisi->surat_masuks->tanggal_surat))}}</td>
            </tr>
            <tr class="details">
                <td>Nomor Surat</td>
                <td>:</td>
                <td>{{$disposisi->surat_masuks->nomor_surat}}</td>
            </tr>
            <tr class="details">
                <td>Asal Surat</td>
                <td>:</td>
                <td>{{$disposisi->surat_masuks->asal_surat}}</td>
            </tr>
            <tr class="details">
                <td>Diterima Tanggal</td>
                <td>:</td>
                <td>{{date('d-M-Y', strtotime($disposisi->surat_masuks->created_at))}}</td>
            </tr>
            <tr class="details">
                <td>Nomor Agenda</td>
                <td>:</td>
                <td>{{$disposisi->surat_masuks->id}}</td>
            </tr>
            <tr class="details">
                <td>Diteruskan Kepada</td>
                <td>:</td>
                <td>{{$disposisi->tujuan}}</td>
            </tr>
            <tr class="details">
                <td>Isi Disposisi</td>
                <td>:</td>
                <td>{{$disposisi->isi}}</td>
            </tr>
            <tr class="details">
                <td>Batas Waktu</td>
                <td>:</td>
                <td>{{date('d-M-Y', strtotime($disposisi->batas_waktu))}}</td>
            </tr>
            <tr class="details">
                <td>Sifat</td>
                <td>:</td>
                <td>{{$disposisi->sifat}}</td>
            </tr>
            <tr class="details">
                <td>Catatan</td>
                <td>:</td>
                <td>{{$disposisi->catatan}}</td>
            </tr>
        </table>

        <div style="padding-left:60%; padding-top:2rem; font-family: 'Helvetica Neue', 'Helvetica', Helvetica, Arial, sans-serif;">
            Kepala <br><br><br><br>
            <b><u>{{$instansi->pimpinan}}</u></b>
        </div>
        <div class="footer">
            <b>Halaman 1</b> | Aplikasi Manejemen Surat | <?php echo (new \DateTime())->format('Y-m-d H:i:s'); ?>
        </div>
    </div>

    <script language="javascript">
        var today = new Date();
        document.getElementById('time').innerHTML = today;
    </script>
</body>

</html>