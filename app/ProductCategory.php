<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductCategory extends Model
{
    protected $table = 'product_categories';
    public function product(){
        return $this->hasMany('App\Product','product_categories_id');
    }
}
