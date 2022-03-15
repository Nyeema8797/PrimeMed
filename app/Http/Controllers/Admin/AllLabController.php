<?php

namespace App\Http\Controllers\Admin;
use App\AllLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AllLabController extends Controller
{
    public function lab_list(){
        $masuma = AllLab::paginate(10);
        return view('admin.all-lab.lab_list',compact('masuma'));
    }
    public function create_lab(){
        return view('admin.all-lab.create_lab');
    }
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contactNo' => 'required',
        ]);
        $lab = new AllLab();
        $lab->name = $request->name;
        $lab->address = $request->address;
        $lab->contactNo = $request->contactNo;
        $lab->slug = str_slug($request->name);
        $lab->description = $request->description;
        $lab->save();
        return redirect()->to('admin/all-lab-list');
    }
    public function update_lab($id){
        $masuma = AllLab::find($id);
        return view('admin.all-lab.update_lab',compact('masuma'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'contactNo' => 'required',
        ]);
        $lab = AllLab::find($request->id);
        $lab->name = $request->name;
        $lab->address = $request->address;
        $lab->contactNo = $request->contactNo;
        $lab->slug = str_slug($request->name);
        $lab->description = $request->description;
        $lab->save();
        return redirect()->to('admin/all-lab-list');
    }
    public function delete($id){
        $lab = AllLab::find($id);
        $lab->lab_info()->delete();
        $lab->sub_lab_info()->delete();
        $lab->delete();
        return redirect()->to('admin/all-lab-list');
    }
}
