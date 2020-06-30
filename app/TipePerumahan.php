<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TipePerumahan extends Model
{
    protected $table = 'tipe_rumahs';

    public function images(){
       return  $this->hasMany(TipePerumahanImages::class, 'tipe_rumah_id');
    }
}
