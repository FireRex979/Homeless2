<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KategoriArtikel extends Model
{
    use SoftDeletes;

    protected $table = "category_articles";
    protected $dates = ['deleted_at'];
}
