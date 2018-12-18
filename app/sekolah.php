<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class sekolah extends Model
{
    // 
    protected $primaryKey = 'id_sekolah';
    
    public function jurusan(){
        return $this->hasMany('App\jurusan');
    }
}
