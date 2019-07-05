<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class siswa extends Model
{
    protected $table = 'siswas';
    protected $fillable = array('nama', 'umur','cita_cita','hobby','guru');
}
