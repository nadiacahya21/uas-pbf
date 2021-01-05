<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Berobat extends Model
{
    protected $guarded = [];

    public function resep()
    {
        return $this->belongsToMany(Obat::class, 'resep_obats', 'id_berobat', 'id_obat');
    }

    public function dokter()
    {
        return $this->belongsTo(Dokter::class, 'id_dokter');
    }

    public function pasien()
    {
        return $this->belongsTo(Pasien::class, 'id_pasien');
    }
}
