<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dekripsi extends Model
{
    protected $guarded = [];
    
    public function produk(){
        return $this->belongsTo(Produk::class, 'produk_id', 'id');
    }
}
