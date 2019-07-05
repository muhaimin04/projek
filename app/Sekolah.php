<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    protected $table = 'siswas';
    protected $fillable = array('nama', 'umur','ttl','alamat','jabatan');
}
