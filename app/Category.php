<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The table associated with the model
     */
    protected $table = 'categories';

    /**
     * Attributes that are mass assignable
     */
    protected $fillable = ['name'];

    function products() {
        return $this->hasMany('App\Product', 'category_id');
    }
}
