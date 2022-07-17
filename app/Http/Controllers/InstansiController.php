<?php

namespace App\Http\Controllers;

use App\Instansi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InstansiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Instansi';
        $instansi = Instansi::first();
        return view('instansi.index', compact(
            'title',
            'instansi'
        ));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $title = 'Edit Instansi';
        $instansi = Instansi::findorfail($id);
        return view('instansi.edit', compact(
            'title',
            'instansi'
        ));
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
            'nama' => 'required|max:100',
            'alamat' => 'required',
            'pimpinan' => 'required|max:35',
            'email' => 'required|max:100',
            'logo' => 'file|mimes:jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            return back()->with('toast_error', $validator->messages()->all()[0])->withInput();
        } else {
            $instansi = Instansi::findorfail($id);

            if ($request->has('logo')) {
                $logo_file = $request->file('logo');
                $name_logo = 'logo.' . $logo_file->getClientOriginalExtension();
                $logo_file->move('dist/img/logo/', $name_logo);

                $data = [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'pimpinan' => $request->pimpinan,
                    'email' => $request->email,
                    'logo' => $name_logo,
                ];
            } else {
                $data = [
                    'nama' => $request->nama,
                    'alamat' => $request->alamat,
                    'pimpinan' => $request->pimpinan,
                    'email' => $request->email,
                ];
            }

            $instansi->update($data);

            return redirect()->route('instansi.index')->with('toast_success', 'Data berhasil diupdate');
        }
    }
}
