<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubLabInfo extends Model
{
    protected $table = 'sub_lab_infos';
    public function all_lab(){
        return $this -> belongsTo('App\AllLab','all_lab_id');
    }
    public function lab_info(){
        return $this -> belongsTo('App\LabInfo','lab_info_id');
    }
}
