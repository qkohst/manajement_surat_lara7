<?php

namespace App\Http\Controllers;

use App\Exports\AgendaSuratMasukExport;
use App\Instansi;
use App\SuratMasuk;
use Illuminate\Http\Request;
use PDF;
use Excel;

class AgendaSuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Agenda Surat Masuk';
        $data_surat_masuk = SuratMasuk::orderBy('id', 'DESC')->get();
        return view('surat_masuk.agenda', compact('title', 'data_surat_masuk'));
    }


    public function print(Request $request)
    {
        $title = 'AGENDA SURAT MASUK';
        $instansi = Instansi::first();

        $data_surat_masuk = SuratMasuk::orderBy('id', 'DESC')->get();

        $pdf = PDF::loadview('surat_masuk.print_agenda', compact('title', 'instansi', 'data_surat_masuk'))->setPaper('Folio', 'landscape');
        return $pdf->stream();
    }

    public function export()
    {
        $filename = 'agenda_surat_masuk ' . date('Y-m-d H_i_s') . '.xlsx';
        return Excel::download(new AgendaSuratMasukExport, $filename);
    }
}
