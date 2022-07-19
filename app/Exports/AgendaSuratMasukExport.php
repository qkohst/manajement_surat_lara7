<?php

namespace App\Exports;

use App\Instansi;
use App\SuratMasuk;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class AgendaSuratMasukExport implements FromView, ShouldAutoSize
{
    public function view(): View
    {
        $instansi = Instansi::first();
        $time_download = date('Y-m-d H:i:s');
        $data_surat_masuk = SuratMasuk::orderBy('id', 'ASC')->get();
        return view('surat_masuk.exports_agenda', compact('instansi', 'time_download', 'data_surat_masuk'));
    }
}
