<?php

namespace App\Http\Controllers\User;
use App\Department;
use App\ProductCategory;
use App\AllLab;
use App\LabInfo;
use App\LabReport;
use Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LaboratoryController extends Controller
{
    public function lab($id){
        $labs = AllLab::all();
        $depts = Department::all();
        $lab = AllLab::find($id);
        $labinfo = LabInfo::where('all_lab_id',$id)->get();
        return view('user.laboratory.lab',compact('depts','labs','lab','labinfo'));
    }
    public function lab_report(){
        $depts = Department::all();
        $labs = AllLab::all();
        return view('user.laboratory.lab-report',compact('depts','labs'));
    }
    public function save(Request $request){
        $request->validate([
            'patientName' => 'required',
            'deliveryAddress' => 'required',
            'phoneNo' => 'required',
            'age' => 'required',
            'labTestRecipte' => 'required',
        ]);
        $userID = Auth::user()->id;
        $labReport = new LabReport();
        $labReport->patientName = $request->patientName;
        $labReport->user_id = $userID;
        $labReport->deliveryAddress = $request->deliveryAddress;
        $labReport->phoneNo = $request->phoneNo;
        $labReport->age = $request->age;
        if ($request -> hasFile('labTestRecipte')) {
            $extension = $request->labTestRecipte->extension();
            $fileName = str_slug($request ->patientName,'_').'_'.md5(date('Y-m-d H:i:s'));
            $fileName = $fileName.'.'.$extension;
            $labReport -> labTestRecipte = $fileName;
            $request -> labTestRecipte-> move('public/uploads/labReport',$fileName);
        }
        $labReport->save();
        return redirect()->back()->with(['masuma' => 'Your delivery address is confirmed!']);
    }
}
