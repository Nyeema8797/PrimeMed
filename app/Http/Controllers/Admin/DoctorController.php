<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Department;
use App\SubDepartment;
use App\Doctor;
class DoctorController extends Controller
{
    public function list(){
        $doctor = Doctor::paginate(5);
        return view('admin.doctor.list',compact('doctor'));
    }
    public function sub_dept(Request $request){
        $sub_dept = SubDepartment::where('department_id',$request->dept_id)->get();
        return response()->json($sub_dept);
    }
    public function create_doctor(){
        $dept = Department::all();
        return view('admin.doctor.create_doctor',compact('dept'));
    }
    public function save(Request $request){
        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'degrees' => 'required',
            'checkFee' => 'required',
            'chamberDetails' => 'required',
            'mobileNo' => 'required',
            'time' => 'required',
            'specialist' => 'required',        
        ]);
        $doctor = new Doctor();
        $doctor->department_id = $request->department_id;
        $doctor->sub_department_id = $request->sub_department_id;
        $doctor->name = $request->name;
        $doctor->degrees = $request->degrees;
        $doctor->checkFee = $request->checkFee;
        $doctor->chamberDetails = $request->chamberDetails;
        $doctor->mobileNo = $request->mobileNo;
        $doctor->time = $request->time;
        $doctor->description = $request->description;
        $doctor->specialist = $request->specialist;
        if ($request -> hasFile('imageName')) {
            $extension = $request->imageName->extension();
            $fileName = str_slug($request ->name,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
            $doctor -> imageName = $fileName;
            $request -> imageName-> move('public/uploads/doctor',$fileName);
        }
        $doctor->save();
        return redirect()->to('admin/doctor-list');
    }
    public function delete($id){
        $doctor = Doctor::find($id);
        $path = public_path('uploads/doctor/'.$doctor->imageName);
        if(file_exists($path)){
            unlink($path);
        }
        $doctor->appointment()->delete();
        $doctor->delete();
        return redirect()->to('admin/doctor-list');
    }
    public function update_doctor($id){
        $doctor = Doctor::find($id);
        $dept = Department::all();
        return view('admin.doctor.update_doctor',compact('doctor','dept'));
    }
    public function update(Request $request){
        $request->validate([
            'department_id' => 'required',
            'name' => 'required',
            'degrees' => 'required',
            'checkFee' => 'required',
            'chamberDetails' => 'required',
            'mobileNo' => 'required',
            'time' => 'required',
            'specialist' => 'required',      
        ]);
        $doctor = Doctor::find($request->id);
        $doctor->department_id = $request->department_id;
        $doctor->sub_department_id = $request->sub_department_id;
        $doctor->name = $request->name;
        $doctor->degrees = $request->degrees;
        $doctor->checkFee = $request->checkFee;
        $doctor->chamberDetails = $request->chamberDetails;
        $doctor->mobileNo = $request->mobileNo;
        $doctor->time = $request->time;
        $doctor->description = $request->description;
        $doctor->specialist = $request->specialist;
        $path = public_path('uploads/doctor/'.$doctor->imageName);
        if(file_exists($path)){
            unlink($path);
        }
        if ($request -> hasFile('imageName')) {
            $extension = $request->imageName->extension();
            $fileName = str_slug($request ->name,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
            $doctor -> imageName = $fileName;
            $request -> imageName-> move('public/uploads/doctor',$fileName);
        }
        $doctor->save();
        return redirect()->to('admin/doctor-list');
    }
    
}
