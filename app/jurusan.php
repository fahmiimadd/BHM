<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\sekolah;

class jurusan extends Model
{
    //
    protected $primaryKey = 'id_jurusan';

    public function sekolah(){
        return $this->belongsTo('App\sekolah','id_sekolah');
    }
    public function siswa(){
        return $this->hasMany('App\siswa');
    }


}
