<?php

namespace App\Http\Controllers;

use App\Klasifikasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KlasifikasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Klasifikasi Surat';
        $data_klasifikasi = Klasifikasi::orderBy('kode', 'asc')->get();
        return view('klasifikasi.index', compact(
            'title',
            'data_klasifikasi'
        ));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|unique:klasifikasis|min:5|max:30',
            'kode' => 'required|unique:klasifikasis|min:1|max:5',
            'keterangan' => 'required|min:5|max:50',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $klasifikasi = new Klasifikasi([
                'nama' => $request->nama,
                'kode' => $request->kode,
                'keterangan' => $request->keterangan,
            ]);
            $klasifikasi->save();
            return back()->with('toast_success', 'Data berhail disimpan');
        }
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
        $klasifikasi = Klasifikasi::findorfail($id);
        $validator = Validator::make($request->all(), [
            'nama' => 'required|min:5|max:30',
            'keterangan' => 'required|min:5|max:50',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $data = [
                'nama' => $request->nama,
                'keterangan' => $request->keterangan,
            ];
            $klasifikasi->update($data);
            return back()->with('toast_success', 'Data berhail disimpan');
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
        try {
            $klasifikasi = Klasifikasi::findorfail($id);
            $klasifikasi->delete();
            return back()->with('toast_success', 'Berhasil dihapus.');
        } catch (\Exception $e) {
            return back()->with('toast_error', 'Data tidak dapat dihapus.');
        }
    }
}
