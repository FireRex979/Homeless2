<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DetailKelebihan extends Model
{
    protected $table = 'detail_kelebihans';

    public function detailKelebihan(){
        return $this->hasMany('App\DetailKelebihan', 'kelebihan_id');
    }

    public function perumahan(){
        return $this->belongsToMany('App\Perumahan', 'detail_kelebihan', 'kelebihan_id', 'perumahan_id');
    }
}
