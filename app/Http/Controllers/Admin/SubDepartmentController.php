<?php

namespace App\Http\Controllers\Admin;
use App\SubDepartment;
use App\Department;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SubDepartmentController extends Controller
{
    public function list(){
        $sub_dept = SubDepartment::paginate(5);
        return view('admin.sub-department.list',compact('sub_dept'));
    }
    public function create_sub_department(){
        $dept = Department::all();
        return view('admin.sub-department.create_sub_department',compact('dept'));
    }
    public function save(Request $request){
        $request->validate([
            'department_id' => 'required',
            'sub_Dept_Name' => 'required',
            'description' => 'required',
        ]);
        $sub_dept = new SubDepartment();
        $sub_dept->department_id = $request->department_id;
        $sub_dept->sub_Dept_Name = $request->sub_Dept_Name;
        $sub_dept->slug = str_slug($request->sub_Dept_Name);
        $sub_dept->description = $request->description;
        $sub_dept->save();
        return redirect()->to('admin/sub-department-list');
    }
    public function update_sub_department($id){
        $sub_dept = SubDepartment::find($id);
        $dept = Department::all();
        return view('admin.sub-department.update_sub_department',compact('sub_dept','dept'));
    }
    public function update(Request $request){
        $sub_dept = SubDepartment::find($request->id);
        $sub_dept->department_id = $request->department_id;
        $sub_dept->slug = str_slug($request->sub_Dept_Name);
        $sub_dept->sub_Dept_Name = $request->sub_Dept_Name;
        $sub_dept->description = $request->description;
        $sub_dept->save();
        return redirect()->to('admin/sub-department-list');
    }
    public function delete($id){
        $sub_dept = SubDepartment::find($id);
        $sub_dept->doctor()->delete();
        $sub_dept->delete();
        return redirect()->to('admin/sub-department-list');
    }

}
