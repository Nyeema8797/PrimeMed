<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubDepartment extends Model
{
    protected $table = 'sub_departments';
    public function department(){
        return $this->belongsTo('App\Department','department_id');
    }
    //public function doctor(){
      //  return $this->hasMany('App\SubDepartment','sub_department_id');
    //}
    public function doctor(){
        return $this->hasMany('App\Doctor','sub_department_id');
    }
}
