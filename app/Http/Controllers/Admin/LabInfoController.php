<?php

namespace App\Http\Controllers\Admin;
use App\LabInfo;
use App\AllLab;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabInfoController extends Controller
{
    public function list(){
        $labinfo = LabInfo::paginate(10);
        return view('admin.lab-info.list',compact('labinfo'));
    }
    public function create_lab_info(){
        $lab = AllLab::all();
        return view('admin.lab-info.create-lab-info',compact('lab'));
    }
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'all_lab_id' => 'required',
        ]);
        $labinfo = new LabInfo();
        $labinfo->all_lab_id = $request->all_lab_id;
        $labinfo->name = $request->name;
        $labinfo->description = $request->description;
        $labinfo->save();
        return redirect()->to('admin/lab-info-list');
    }
    public function update_lab_info($id){
        $lab = AllLab::all();
        $labinfo = LabInfo::find($id);
        return view('admin.lab-info.update-lab-info',compact('labinfo','lab'));
    }
    public function update(Request $request){
        $request->validate([
            'name' => 'required',
            'all_lab_id' => 'required',
        ]);
        $labinfo = LabInfo::find($request->id);
        $labinfo->all_lab_id = $request->all_lab_id;
        $labinfo->name = $request->name;
        $labinfo->description = $request->description;
        $labinfo->save();
        return redirect()->to('admin/lab-info-list');
    }
    public function delete($id){
        $labinfo = LabInfo::find($id);
        $labinfo->sublabinfo()->delete();
        $labinfo->delete();
        return redirect()->to('admin/lab-info-list');
    }
}
