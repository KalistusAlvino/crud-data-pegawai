<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    protected $table = 'pegawais';

    protected $fillable = [
        'nip',
        'foto_path',
        'nama_pegawai',
        'tempat_lahir',
        'tanggal_lahir',
        'alamat',
        'gender_id',
        'gol_id',
        'eselon_id',
        'jabatan_id',
        'tempat_tugas',
        'unit_id',
        'agama_id',
        'no_hp',
        'npwp'
    ];

    public function gender()
    {
        return $this->belongsTo(Gender::class);
    }

    public function golongan()
    {
        return $this->belongsTo(Golongan::class,'gol_id');
    }

    public function eselon()
    {
        return $this->belongsTo(Eselon::class);
    }

    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class);
    }

    public function unit() {
        return $this->belongsTo(Unit::class);
    }

    public function agama() {
        return $this->belongsTo(Agama::class);
    }


}
