<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /**
     * Attributes that are mass assignable
     */
    protected $fillable = [
        'name',
        'description',
        'quantity',
        'price',
        'category_id'
    ];

    function category() {
        return $this->belongsTo('App\Category');
    }
}
