<?php

namespace App\Http\Controllers\Admin;
use App\LabReport;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LabReportController extends Controller
{
    public function new_lab_report(){
        $labReport = LabReport::paginate(10);
        return view('admin.lab-report.new-lab-report',compact('labReport'));
    }
    public function deleteLabReport($id){
        $labReport = LabReport::find($id);
        $labReport->delete();
        return redirect()->to('admin/new-lab-report');
    }
    public function update(Request $request){
        $labReport = LabReport::find($request->id);
        $labReport->status = $request->status;
        $labReport->save();
        return redirect()->to('admin/new-lab-report');
    }
}
