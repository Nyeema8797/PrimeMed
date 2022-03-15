<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
class UserController extends Controller
{
    public function user_table(){
        $masuma = User::paginate(10);
        return view('admin.user',compact('masuma'));
    }
    public function update(Request $request){
        $user = User::find($request->id);
        $user->userRole = $request->userRole;
        $user->save();
        return redirect()->back();
    }
   
}
