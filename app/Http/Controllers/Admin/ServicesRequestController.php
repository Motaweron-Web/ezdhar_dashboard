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
        if ($request->ajax()) {
            $services_request = ServicesRequest::latest()->get();
            return Datatables::of($services_request)
                ->addColumn('action', function ($services) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $services->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('provider_id', function($data){
                    return $data->provider->first_name;
                })
                ->editColumn('user_id', function($data){
                    return $data->user->first_name;
                })
                ->editColumn('sub_category_id', function($data){
                    return $data->subcategory->title_ar;
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin.services_request.index');
        }

//        $services_request = ServicesRequest::get();
//
//        return view('Admin.services_request.index',compact('services_request'));
    } //end of index

    public function delete(Request $request)
    {
        $services = ServicesRequest::where('id', $request->id)->first();
        $services->delete();
        return response(['message' => 'تم الحذف بنجاح', 'status' => 200], 200);
    } // end delete
} //end of class
