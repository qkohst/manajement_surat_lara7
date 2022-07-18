<?php

namespace App\Http\Controllers;

use App\Klasifikasi;
use App\SuratKeluar;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Surat Keluar';
        $data_klasifikasi = Klasifikasi::orderBy('kode', 'ASC')->get();
        if ($data_klasifikasi->count() == 0) {
            return redirect('klasifikasi')->with('toast_warning', 'Mohon isikan data klasifikasi surat');
        } else {
            $data_surat_keluar = SuratKeluar::orderBy('id', 'DESC')->get();
            return view('surat_keluar.index', compact('title', 'data_klasifikasi', 'data_surat_keluar'));
        }
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
            'nomor_surat' => 'required|min:3|max:100|unique:surat_masuks',
            'tujuan_surat' => 'required|min:3|max:100',
            'isi_ringkas' => 'required|min:5|max:255',
            'klasifikasi_id' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required|max:255',
            'file' => 'max:2048',
        ]);
        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $file_surat = $request->file('file');
            $name_file = time() . '.' . $file_surat->getClientOriginalExtension();
            $file_surat->move('dist/img/surat_keluar/', $name_file);

            $surat_keluar = new SuratKeluar([
                'users_id' => Auth::user()->id,
                'klasifikasis_id' => $request->klasifikasi_id,
                'nomor_surat' => $request->nomor_surat,
                'tujuan_surat' => $request->tujuan_surat,
                'isi_surat' => $request->isi_ringkas,
                'tanggal_surat' => $request->tanggal_surat,
                'file' => $name_file,
                'keterangan' => $request->keterangan,
            ]);
            $surat_keluar->save();
            return back()->with('toast_success', 'Data berhasil ditambahkan');
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
        $validator = Validator::make($request->all(), [
            'tujuan_surat' => 'required|min:3|max:100',
            'isi_ringkas' => 'required|min:5|max:255',
            'klasifikasi_id' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $surat_keluar = SuratKeluar::findorfail($id);
            $data = [
                'tujuan_surat' => $request->tujuan_surat,
                'isi_surat' => $request->isi_ringkas,
                'klasifikasi_id' => $request->klasifikasi_id,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
            ];
            $surat_keluar->update($data);

            return redirect()->route('suratkeluar.index')->with('toast_success', 'Data berhasil diupdate');
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
        $surat_keluar = SuratKeluar::findorfail($id);
        try {
            File::delete(public_path("dist/img/surat_keluar/" . $surat_keluar->file));
            $surat_keluar->delete();
            return back()->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_error', 'Data tidak dapat dihapus');
        }
    }

    public function galeri(Request $request)
    {
        $title = 'Galeri Surat Keluar';
        $data_surat_keluar = SuratKeluar::orderBy('id', 'DESC')->get();
        return view('surat_keluar.galeri', compact('title', 'data_surat_keluar'));
    }

    public function tampil($id)
    {
        $title = 'File Surat Keluar';
        $surat_keluar = SuratKeluar::findorfail($id);
        return view('surat_keluar.tampil', compact('title', 'surat_keluar'));
    }
}
