<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ServicesRequest;
use App\Models\SubCategory;
use App\Models\User;
use App\Models\Users;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use Yajra\DataTables\Html\Columns\Action;

class ServicesRequestController extends Controller
{
    public function index(Request $request)
    {
        $services_request = ServicesRequest::get();

        return view('Admin.services_request.index',compact('services_request'));
    } //end of index

    public function delete(Request $request)
    {
        $services = ServicesRequest::where('id', $request->id)->first();
        $services->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->back()->with('message', 'delete success');

    } // end delete
} //end of class
