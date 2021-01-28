<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    protected $guarded = [];
    // protected $fillable = ['code', 'name_produk', 'image', 'stock', 'price', 'category_id'];
    public function dekripsi(){
        return $this->hasOne(Dekripsi::class, 'produk_id', 'id');
    }

    public function kategori(){
        return $this->belongsTo(Kategori::class, 'category_id', 'id');
    }

}
