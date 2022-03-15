<?php

namespace App\Http\Controllers\User;
use App\Department;
use App\ProductCategory;
use App\AllLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cookie;

class HomeController extends Controller
{
    public function index(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.home',compact('depts','labs'));
    }

    public function gen_session(){
        if (!Cookie::get('unique_session')) {
            Cookie::queue('unique_session', md5(date('Y-m-d H:i:s')), config('sp.cookie_time'));
        }
    }

    public function remove_session(){

        if (Cookie::get('unique_session')) {
            Cookie::queue('unique_session', null, 0);
        }

        return redirect()->back();
    }
}
