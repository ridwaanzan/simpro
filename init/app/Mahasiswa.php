<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswas';
    protected $fillable = ['nama', 'nim', 'id_jurusan'];

    public function jurusan()
    {
    	return $this->belongsTo('App\Jurusan', 'id_jurusan', 'id');
    }
}