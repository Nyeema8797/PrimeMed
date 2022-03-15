<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempOrder extends Model
{
 protected $table = "temp_orders";

 public function product()
 {
     return $this->belongsTo('App\Product','product_id');
 }
}
