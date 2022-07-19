<?php

namespace App\Http\Controllers;

use App\Exports\AgendaSuratKeluarExport;
use App\Instansi;
use App\SuratKeluar;
use Illuminate\Http\Request;
use PDF;
use Excel;

class AgendaSuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Agenda Surat Keluar';
        $data_surat_keluar = SuratKeluar::orderBy('id', 'DESC')->get();
        return view('surat_keluar.agenda', compact('title', 'data_surat_keluar'));
    }

    public function print(Request $request)
    {
        $title = 'AGENDA SURAT KELUAR';
        $instansi = Instansi::first();

        $data_surat_keluar = SuratKeluar::orderBy('id', 'DESC')->get();

        $pdf = PDF::loadview('surat_keluar.print_agenda', compact('title', 'instansi', 'data_surat_keluar'))->setPaper('Folio', 'landscape');
        return $pdf->stream();
    }

    public function export()
    {
        $filename = 'agenda_surat_keluar ' . date('Y-m-d H_i_s') . '.xlsx';
        return Excel::download(new AgendaSuratKeluarExport, $filename);
    }
}
