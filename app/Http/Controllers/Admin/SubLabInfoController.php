<?php

namespace App\Http\Controllers\Admin;
use App\AllLab;
use App\LabInfo;
use App\SubLabInfo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubLabInfoController extends Controller
{
    public function list(){
        $masuma = SubLabInfo::paginate(10);
        return view('admin.sub-lab-info.list',compact('masuma'));
    }
    public function lab_info(Request $request){
        $lab_info = LabInfo::where('all_lab_id', $request->all_lab_id)->get();
        return response()->json($lab_info);
    }
    public function create_sub_lab(){
        $lab = AllLab::all();
        $labinfo = LabInfo::all();
        return view('admin.sub-lab-info.create-sub-lab',compact('lab','labinfo'));
    }
    public function save(Request $request){
        $request->validate([
            'all_lab_id' => 'required',
            'lab_info_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $masuma = new SubLabInfo();
        $masuma->all_lab_id = $request->all_lab_id;
        $masuma->lab_info_id = $request->lab_info_id;
        $masuma->name = $request->name;
        $masuma->price = $request->price;
        $masuma->description = $request->description;
        $masuma->save();
        return redirect()->to('admin/sub-lab-info-list');
    }
    public function update_sub_lab($id){
        $masuma = SubLabInfo::find($id);
        $lab = AllLab::all();
        $labinfo = LabInfo::all();
        return view('admin.sub-lab-info.update-sub-lab',compact('masuma','lab','labinfo'));
    }
    public function update(Request $request){
        $request->validate([
            'all_lab_id' => 'required',
            'lab_info_id' => 'required',
            'name' => 'required',
            'price' => 'required',
        ]);
        $masuma = SubLabInfo::find($request->id);
        $masuma->all_lab_id = $request->all_lab_id;
        $masuma->lab_info_id = $request->lab_info_id;
        $masuma->name = $request->name;
        $masuma->price = $request->price;
        $masuma->description = $request->description;
        $masuma->save();
        return redirect()->to('admin/sub-lab-info-list');
    }
    public function delete($id){
        $masuma = SubLabInfo::find($id);
        $masuma->delete();
        return redirect()->to('admin/sub-lab-info-list');
    }
}
