<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImages extends Model
{
    protected $fillable = [
        'image', 'product_id', 'created_at', 'updated_at'
    ];

    public function productsImage() 
    {
        return $this->hasMany(ProductsImage::class);
    }
}
