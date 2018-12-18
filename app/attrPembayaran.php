<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class attrPembayaran extends Model
{
    //
    protected $primaryKey = 'id_pembayaran'; 
    public function period(){
        return $this->belongsTo('App\period','id_period'); 
    }
    public function skema(){
        return $this->belongsToMany('App\skema');
    }
    public function siswa(){
        return $this->belongsToMany('App\siswa')->withTimestamps();
    }
    public function bayar(){
        return $this->belongsToMany('App\bayar');
    }
}
