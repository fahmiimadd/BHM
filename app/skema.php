<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class skema extends Model
{
    //
    protected $primaryKey = 'id_skema';
    public function attrPembayaran(){
        return $this->belongsToMany('App\attrPembayaran');
    }
    public function siswa(){
        return $this->hasMany('App\siswa');
    }

}
 
