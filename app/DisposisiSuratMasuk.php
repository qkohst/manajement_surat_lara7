<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DisposisiSuratMasuk extends Model
{
    protected $fillable = [
        'users_id',
        'surat_masuks_id',
        'tujuan',
        'isi',
        'sifat',
        'batas_waktu',
        'catatan',
    ];

    public function users()
    {
        return $this->belongsTo('App\User');
    }

    public function surat_masuks()
    {
        return $this->belongsTo('App\SuratMasuk');
    }
}
