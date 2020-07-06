<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Furniture extends Model
{
    use SoftDeletes;

    protected $table = 'furnitures';
    protected $dates = ['deleted_at'];
}
