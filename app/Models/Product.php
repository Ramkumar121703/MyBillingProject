<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
     protected $fillable = [
        'product_name',
        'product_price',
        'product_quantity',
        'product_gst',
        'product_discount',
     ];


     public function grahak(){
        return $this->belongsTo(Grahak::class);
     }
}
 