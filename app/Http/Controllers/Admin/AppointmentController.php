<?php

namespace App\Http\Controllers\Admin;
use App\Appointment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class AppointmentController extends Controller
{
    public function appointment_list(){
        $appointment = Appointment::where('status','unchecked')->get();
        return view('admin.appointment.list',compact('appointment'));
    }
    
    public function checked_list(){
        $appointment = Appointment::paginate(10);
        return view('admin.appointment.checked_list',compact('appointment'));
    }
    public function check($id)
    {
        $appointment = Appointment::find($id);

        if($appointment->status == 'unchecked'){
            $appointment->status = 'checked';
            $appointment->save();
        }
        return redirect()->back();
    }
    public function update(Request $request){
        $appointment = Appointment::find($request->id);
        $appointment->status = $request->status;
        $appointment->save();
        return redirect()->back();
    }
    public function delete($id){
        $appointment = Appointment::find($id);
        $appointment->delete();
        return redirect()->back();
    }
}
