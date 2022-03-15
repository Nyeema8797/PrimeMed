<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LabInfo extends Model
{
    protected $table = 'lab_infos';
    public function all_lab(){
        return $this->belongsTo('App\AllLab','all_lab_id');
    }
    public function sublabinfo(){
        return $this->hasMany('App\SubLabInfo','lab_info_id');
    }
}
