<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class period extends Model
{
    //
    protected $primaryKey = 'id_period';
    public function attrPembayaran(){
        return $this->hasMany('App\attrPembayaran');
    }
} 
