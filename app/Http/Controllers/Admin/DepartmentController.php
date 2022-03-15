<?php

namespace App\Http\Controllers\admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
class DepartmentController extends Controller
{
    public function list(){
        $dept = Department::paginate(5);
        return view('admin.department.list',compact('dept'));
    }
    public function create_department(){
        return view('admin.department.create_department');
    }
    public function save(Request $request){
        $request->validate([
            'dept_Name' => 'required',
        ]);
        $dept = new Department();
        $dept->dept_Name = $request->dept_Name;
        $dept->description = $request->description;
        $dept->slug = str_slug($request->dept_Name);
        $dept->save();
        return redirect()->to('admin/list');
    }
    public function update_department($id){
        $dept = Department::find($id);
        return view('admin.department.update_department',compact('dept'));
    }
    public function update(Request $request){
        $request->validate([
            'dept_Name' => 'required',
        ]);
        $dept = Department::find($request->id);
        $dept->dept_Name = $request->dept_Name;
        $dept->slug = str_slug($request->dept_Name);
        $dept->description = $request->description;
        $dept->save();
        return redirect()->to('admin/list');
    }
    public function delete($id){
        $dept = Department::find($id);
        $dept->sub_department()->delete();
        $dept->doctor()->delete();
        $dept->delete();
        return redirect()->to('admin/list');
    }

}
