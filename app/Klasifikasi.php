<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Klasifikasi extends Model
{
    protected $fillable = [
        'nama', 'kode', 'keterangan'
    ];

    public function surat_masuks()
    {
        return $this->hasMany('App\SuratMasuk');
    }

    public function surat_keluars()
    {
        return $this->hasMany('App\SuratKeluar');
    }
}
