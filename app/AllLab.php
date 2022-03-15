<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllLab extends Model
{
    protected $table = 'all_labs';
    public function lab_info(){
       return $this->hasMany('App\LabInfo','all_lab_id');
    }
    public function sub_lab_info(){
        return $this->hasMany('App\SubLabInfo','all_lab_id');
    }
}
