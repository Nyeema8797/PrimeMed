<?php

namespace App\Http\Controllers\User;
use App\Department;
use App\ProductCategory;
use App\AllLab;
use App\Services;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ServicesController extends Controller
{
    public function services(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.otherService.services',compact('depts','labs'));
    }
    public function services_form(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.otherService.service-form',compact('depts','labs'));
    }
    public function save(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'mobileNo' => 'required',
            'address' => 'required',
            'services' => 'required',
            'bloodGroup' => 'required',
        ]);
        $userID = Auth::user()->id;
        $services = new Services();
        $services->user_id = $userID;
        $services->name = $request->name;
        $services->email = $request->email;
        $services->mobileNo = $request->mobileNo;
        $services->address = $request->address;
        $services->services = $request->services;
        $services->bloodGroup = $request->bloodGroup;
        $services->message = $request->message;
        $services->save();
        return redirect()->back()->with(['message' => 'Please go to dashboard and get service']);
    }
}
