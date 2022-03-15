<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $table = 'appointments';
    public function doctor(){
        return $this->belongsTo('App\Doctor','doctor_id');
    }
    public function customer(){
        return $this->belongsTo('App\User','user_id');
    }
}
