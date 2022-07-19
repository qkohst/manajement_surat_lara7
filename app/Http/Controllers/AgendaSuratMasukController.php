<?php

namespace App\Http\Controllers;

use App\Instansi;
use App\SuratMasuk;
use Illuminate\Http\Request;
use PDF;

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
