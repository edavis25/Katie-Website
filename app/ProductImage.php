<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    /**
     * Attributes that are mass assignable
     */
    protected $fillable = [
        'name',
        'original_name',
        'full_path',
        'public_path',
        'size',
        'extension',
        'product_id',
        'featured'
    ];

    function product() {
        return $this->belongsTo('App\Product');
    }
}
