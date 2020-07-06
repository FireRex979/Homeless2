<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Perumahan extends Model
{
    use SoftDeletes;

    protected $table = 'perumahans';
    protected $dates = ['deleted_at'];

    public function tipe(){
        return $this->belongsToMany('App\TipePerumahan','detail_perumahans', 'perumahan_id', 'tipe_rumah_id')->withPivot('id');
    }

    public function kelebihan(){
        return $this->belongsToMany('App\Kelebihan', 'detail_kelebihans', 'perumahan_id', 'kelebihan_id')->withPivot('id','nilai');
    }

    public function image(){
        return $this->hasMany('App\PerumahanImage', 'perumahan_id');
    }

    public function detailKelebihan(){
        return $this->hasMany('App\DetailKelebihan', 'perumahan_id');
    }
}
