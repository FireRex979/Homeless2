<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TipePerumahan extends Model
{
    use SoftDeletes;

    protected $table = 'tipe_rumahs';
    protected $dates = ['deleted_at'];


    public function images(){
       return  $this->hasMany(TipePerumahanImages::class, 'tipe_rumah_id');
    }

    public function fasilitas(){
        return $this->belongsToMany('App\Fasilitas', 'detail_fasilitas', 'tipe_rumah_id', 'fasilitas_id')->withPivot('id', 'jumlah');
    }
}
