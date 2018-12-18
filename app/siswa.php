<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;

class siswa extends Model
{
    //
    
    use Sortable;
    public $sortable = ['id_siswa', 'id_jurusan', 'id_skema', 'namaSiswa', 'angkatan'];
    protected $primaryKey = 'id_siswa';
    public function attrPembayaran(){
        return $this->belongsToMany('App\attrPembayaran')->withTimestamps();
    }
    public function jurusan(){
        return $this->belongsTo('App\jurusan','id_jurusan');
    }
    public function skema(){
        return $this->belongsTo('App\skema','id_skema');
    }
    public function siswa(){
        return $this->hasMany('App\bayar');
    }
}
