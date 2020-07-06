<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipePerumahanImages extends Model
{
    protected $table = 'tipe_rumah_images';

    public function tipePerumahan(){
        return $this->belongsTo(TipePerumahan::class);
    }
}
