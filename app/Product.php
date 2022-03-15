<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';
    public function scopeSearch($query, $search){
        return $query->where('name','like',$search.'%')
            ->orWhere('group','like',$search.'%')
            ->orWhere('type','like',$search.'%');
    }
    public function product_category(){
        return $this-> belongsTo('App\ProductCategory','product_categories_id');
    }
    public function orderItem(){
        return $this-> hasMany('App\OrderItems','product_id');
    }
    public function tempOrder(){
        return $this-> hasMany('App\TempOrder','product_id');
    }
}
