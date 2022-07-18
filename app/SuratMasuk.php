<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    protected $fillable = [
        'users_id',
        'klasifikasis_id',
        'nomor_surat',
        'asal_surat',
        'isi_surat',
        'tanggal_surat',
        'file',
        'keterangan',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function klasifikasis()
    {
        return $this->belongsTo('App\Klasifikasi');
    }

    public function disposisi_surat_masuks()
    {
        return $this->hasMany('App\DisposisiSuratMasuk');
    }
}
