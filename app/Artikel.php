<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Artikel extends Model
{
    use SoftDeletes;

    protected $table = 'articles';
    protected $dates = ['deleted_at'];

    public function kategori(){
        return $this->belongsTo('App\KategoriArtikel', 'category_id');
    }
}
