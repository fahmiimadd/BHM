<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class bayar extends Model
{
    //
    protected $primaryKey = 'id_bayar';

    public function siswa(){
        return $this->belongsTo('App\siswa','id_siswa');
    }

    public function attrPembayaran(){
        return $this->belongsToMany('App\attrPembayaran');
    }
}
