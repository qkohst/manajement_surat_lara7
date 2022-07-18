<?php

namespace App\Http\Controllers;

use App\DisposisiSuratMasuk;
use App\Klasifikasi;
use App\SuratMasuk;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class SuratMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Surat Masuk';
        $data_klasifikasi = Klasifikasi::orderBy('kode', 'ASC')->get();
        if ($data_klasifikasi->count() == 0) {
            return redirect('klasifikasi')->with('toast_warning', 'Mohon isikan data klasifikasi surat');
        } else {
            $data_surat_masuk = SuratMasuk::orderBy('id', 'DESC')->get();
            return view('surat_masuk.index', compact('title', 'data_klasifikasi', 'data_surat_masuk'));
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
            'asal_surat' => 'required|min:3|max:100',
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
            $file_surat->move('dist/img/surat_masuk/', $name_file);

            $surat_masuk = new SuratMasuk([
                'users_id' => Auth::user()->id,
                'klasifikasis_id' => $request->klasifikasi_id,
                'nomor_surat' => $request->nomor_surat,
                'asal_surat' => $request->asal_surat,
                'isi_surat' => $request->isi_ringkas,
                'tanggal_surat' => $request->tanggal_surat,
                'file' => $name_file,
                'keterangan' => $request->keterangan,
            ]);
            $surat_masuk->save();
            return back()->with('toast_success', 'Data berhasil ditambahkan');
        }
    }

    public function show($id)
    {
        $title = 'Disposisi Surat Masuk';
        $surat_masuk = SuratMasuk::findorfail($id);
        $data_disposisi = DisposisiSuratMasuk::where('surat_masuks_id', $id)->get();
        return view('disposisi_surat_masuk.index', compact('title', 'surat_masuk', 'data_disposisi'));
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
            'asal_surat' => 'required|min:3|max:100',
            'isi_ringkas' => 'required|min:5|max:255',
            'klasifikasi_id' => 'required',
            'tanggal_surat' => 'required',
            'keterangan' => 'required|max:255',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $surat_masuk = SuratMasuk::findorfail($id);
            $data = [
                'asal_surat' => $request->asal_surat,
                'isi_surat' => $request->isi_ringkas,
                'klasifikasi_id' => $request->klasifikasi_id,
                'tanggal_surat' => $request->tanggal_surat,
                'keterangan' => $request->keterangan,
            ];
            $surat_masuk->update($data);

            return redirect()->route('suratmasuk.index')->with('toast_success', 'Data berhasil diupdate');
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
        $surat_masuk = SuratMasuk::findorfail($id);
        try {
            File::delete(public_path("dist/img/surat_masuk/" . $surat_masuk->file));
            $surat_masuk->delete();
            return back()->with('toast_success', 'Data berhasil dihapus');
        } catch (\Throwable $th) {
            return back()->with('toast_error', 'Data tidak dapat dihapus');
        }
    }

    public function galeri(Request $request)
    {
        $title = 'Galeri Surat Masuk';
        $data_surat_masuk = SuratMasuk::orderBy('id', 'DESC')->get();
        return view('surat_masuk.galeri', compact('title', 'data_surat_masuk'));
    }

    public function tampil($id)
    {
        $title = 'File Surat Masuk';
        $surat_masuk = SuratMasuk::findorfail($id);
        return view('surat_masuk.tampil', compact('title', 'surat_masuk'));
    }
}
