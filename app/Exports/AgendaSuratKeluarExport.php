<?php

namespace App\Exports;

use App\Instansi;
use App\SuratKeluar;
use App\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AgendaSuratKeluarExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $instansi = Instansi::first();
        $time_download = date('Y-m-d H:i:s');
        $data_surat_keluar = SuratKeluar::orderBy('id', 'ASC')->get();
        return view('surat_keluar.exports_agenda', compact('instansi', 'time_download', 'data_surat_keluar'));
    }
}
