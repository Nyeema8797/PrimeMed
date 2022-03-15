<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';
    public function customer(){
        return $this->belongsTo('App\User','user_id');
    }
    public function products(){
        return $this->hasMany('App\OrderItems','order_id');
    }
    
    
}
