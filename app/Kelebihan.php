<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kelebihan extends Model
{
    use SoftDeletes;

    protected $table = "kelebihans";
    protected $dates = ['deleted_at'];
}
