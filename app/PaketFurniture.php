<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PaketFurniture extends Model
{
    protected $table = 'paket_furnitures';

    public function furniture(){
        return $this->belongsToMany('App\Furniture','paket_details', 'paket_id', 'furniture_id')->withPivot('id');
    }
}
