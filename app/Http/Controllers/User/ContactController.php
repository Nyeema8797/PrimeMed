<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\AllLab;
use App\Department;
use App\Contact;
class ContactController extends Controller
{
    public function contact(){
        $labs = AllLab::all();
        $depts = Department::all();
        return view('user.contact.contact',compact('labs','depts'));
    }
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required',
            'contactNo' => 'required',
            'message' => 'required',
        ]);
        $contact = new Contact();
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->contactNo = $request->contactNo;
        $contact->message = $request->message;
        $contact->save();
        return redirect()->back()->with(['masuma' => 'Message Done!']);
    }
}
