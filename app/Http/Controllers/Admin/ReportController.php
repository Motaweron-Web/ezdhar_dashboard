<?php

namespace App\Http\Controllers\Admin;

use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Models\ServicesRequest;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $reports = Report::get();

        return view('Admin.report.index',compact('reports'));
    } //end of index

    public function service(Request $request,  $id)
    {
        $services = ServicesRequest::where('client_id', $id)->get();
        return view('Admin.report.services_index',compact('services'));
    }

    public function delete(Request $request)
    {
        $services = Report::where('id', $request->id)->first();
        $services->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->back()->with('message', 'delete success');

    } // end delete
}
