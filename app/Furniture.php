<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Furniture extends Model
{
    use SoftDeletes;

    protected $table = 'furnitures';
    protected $dates = ['deleted_at'];

    public function image(){
        return $this->hasMany('App\FurnitureImage', 'furniture_id');
    }

    public function kategori(){
        return $this->belongsTo('App\KategoriFurniture', 'category_id');
    }

}
