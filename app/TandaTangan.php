<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TandaTangan extends Model
{
    protected $fillable = ['nama_lengkap', 'NIP','jabatan', 'tempat_menjabat', 'keterangan'];
    
}
