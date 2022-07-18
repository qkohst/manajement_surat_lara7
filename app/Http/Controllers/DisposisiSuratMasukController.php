<?php

namespace App\Http\Controllers;

use App\DisposisiSuratMasuk;
use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use PDF;

class DisposisiSuratMasukController extends Controller
{

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'tujuan' => 'required|min:3|max:100',
            'isi' => 'required|min:3|max:255',
            'sifat' => 'required|min:3|max:100',
            'batas_waktu' => 'required',
            'catatan' => 'required|max:255',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $disposisi = new DisposisiSuratMasuk([
                'users_id' => Auth::user()->id,
                'surat_masuks_id' => $request->surat_masuk_id,
                'tujuan' => $request->tujuan,
                'isi' => $request->isi,
                'sifat' => $request->sifat,
                'batas_waktu' => $request->batas_waktu,
                'catatan' => $request->catatan,
            ]);
            $disposisi->save();
            return back()->with('toast_success', 'Data berhasil ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $title = 'DISPOSISI SURAT';
        $instansi = Instansi::first();
        $disposisi = DisposisiSuratMasuk::findorfail($id);
        $pdf = PDF::loadview('disposisi_surat_masuk.print', compact('title', 'instansi', 'disposisi'))->setPaper('A4', 'potrait');
        return $pdf->stream();
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
        $validator = Validator::make($request->all(), [
            'isi' => 'required|min:3|max:255',
            'sifat' => 'required|min:3|max:100',
            'batas_waktu' => 'required',
            'catatan' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $disposisi = DisposisiSuratMasuk::findorfail($id);
            $data = [
                'isi' => $request->isi,
                'sifat' => $request->sifat,
                'batas_waktu' => $request->batas_waktu,
                'catatan' => $request->catatan,
            ];
            $disposisi->update($data);
            return back()->with('toast_success', 'Data berhasil diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $disposisi = DisposisiSuratMasuk::findorfail($id);
        try {
            $disposisi->delete();
            return back()->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_error', 'Data tidak dapat dihapus');
        }
    }
}
