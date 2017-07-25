<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = [
        'id', 'product_id', 'image_path', 'title', 'alt'
    ];
}
