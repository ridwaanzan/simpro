<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jurusan extends Model
{
    protected $table = 'jurusans';

    public function Mahasiswa() {
    	return $this->hasMany('Mahasiswa');
    }
}
