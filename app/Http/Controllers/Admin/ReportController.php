<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Report;
use App\Http\Controllers\Controller;
use App\Models\ServicesRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Traits\PhotoTrait;


class ReportController extends Controller
{
    use PhotoTrait;
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $reports = Report::latest()->get();
            return Datatables::of($reports)
                ->addColumn('action', function ($reports) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $reports->id . '" data-title="">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('user_id', function ($data){
                    return $data->user->first_name;
                })
                ->editColumn('provider_id', function ($data){
                    return $data->provider->first_name;
                })
                ->editColumn('order_id', function($reports){
                    return '<form method="get" action="'. route('service_reports' ,  $reports->order_id) .'">
                                                <button class="btn btn-pill btn-info-light" type="submit">
                                                    <i class="fas fa-door-open"></i>
                                                </button>
                                            </form>';
                })
                ->editColumn('created_at', function ($data){
                    return $data->created_at->format('m/d/Y');
                })
                ->editColumn('img', function ($reports) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . get_user_file($reports->img) . '">
                    ';
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin.report.index');
        }
    } //end of index

    public function service(Request $request,  $id)
    {
            $order = Order::find($id);
            return view('Admin.report.services_index', compact('order'));

    }

    public function delete(Request $request)
    {
        $services = Report::where('id', $request->id)->first();
        $services->delete();
        toastr()->success('تم الحذف بنجاح');
        return redirect()->back()->with('message', 'delete success');

    } // end delete
}
