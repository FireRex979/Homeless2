<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriFurniture extends Model
{
    use SoftDeletes;

    protected $table = 'category_furnitures';
    protected $dates = ['deleted_at'];
}
