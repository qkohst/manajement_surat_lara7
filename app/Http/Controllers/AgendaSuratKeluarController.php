<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\SuratKeluar;
use Illuminate\Http\Request;
use PDF;

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


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
