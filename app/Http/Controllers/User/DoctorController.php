<?php

namespace App\Http\Controllers\User;
use App\Doctor;
use App\Department;
use App\ProductCategory;
use App\SubDepartment;
use App\Appointment;
use App\AllLab;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class DoctorController extends Controller
{
    public function all_doctor()
    {
        $labs = AllLab::all();
        $depts = Department::all();
        $doctors = Doctor::paginate(10);
        return view('user.doctor.all_doctor',compact('depts','labs','doctors'));
    }
    public function dept_wise($id){
        $labs = AllLab::all();
        $depts = Department::all();
        $dept = Department::find($id);
        $doctors = Doctor::where('department_id',$id)->get();
        return view('user.doctor.dept_wise',compact('depts','doctors','dept','labs'));
    }
    public function sub_dept_wise($id){
        $labs = AllLab::all();
        $depts = Department::all();
        $sub_dept = SubDepartment::find($id);
        $doctors = Doctor::where('sub_department_id',$id)->get();
        return view('user.doctor.sub_dept_wise',compact('depts','doctors','sub_dept','labs'));
    }
    public function doctor_appointment($id){
        $labs = AllLab::all();
        $depts = Department::all();
        $appointment = Doctor::find($id);
        $doctors = Doctor::where('department_id',$id)->get();
        return view('user.doctor.doctor-appointment',compact('depts','appointment','doctors','labs'));
    }
    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'address' => 'required',
            'patient_Age' => 'required',
            'number' => 'required',
        ]);
        $userID = Auth::user()->id;
        $appointment = new Appointment();
        $appointment->user_id = $userID;
        $appointment->doctor_id = $request->doctor_id;
        $appointment->name = $request->name;
        $appointment->address = $request->address;
        $appointment->patient_Age = $request->patient_Age;
        $appointment->number = $request->number;
        $appointment->save();
        return redirect()->back()->with(['masuma' => 'Your Appointment is booked!']);
    }
}
