<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    protected $table='departments';
    public function doctor(){
    	return $this->hasMany('App\Doctor','department_id');
    }
    public function sub_department(){
    	return $this->hasMany('App\SubDepartment','department_id');
    }
    
}
