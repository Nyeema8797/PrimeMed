<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services;
class ServicesController extends Controller
{
    public function services_list(){
        $services = Services::paginate(10);
        return view('admin.otherservices.services-list',compact('services'));
    }
    public function update(Request $request){
        $services = Services::find($request->id);
        $services->adminSays = $request->adminSays;
        $services->save();
        return redirect()->to('admin/services-list');
    }
    public function delete($id){
        $services = Services::find($id);
        $services->delete();
        return redirect()->to('admin/services-list'); 
    }
}
