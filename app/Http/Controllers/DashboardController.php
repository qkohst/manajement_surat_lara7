<?php

namespace App\Http\Controllers;

use App\Klasifikasi;
use App\SuratKeluar;
use App\SuratMasuk;
use App\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Dashboard';
        $count_user = User::all()->count();
        $count_klasifikasi = Klasifikasi::all()->count();
        $count_surat_masuk = SuratMasuk::all()->count();
        $count_surat_keluar = SuratKeluar::all()->count();
        return view('dashboard.index', compact(
            'title',
            'count_user',
            'count_klasifikasi',
            'count_surat_masuk',
            'count_surat_keluar'
        ));
    }
}
