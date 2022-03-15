<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AllLab;
use App\Department;
class BlankController extends Controller
{
    public function blank(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.blank',compact('depts','labs'));
    }
}
