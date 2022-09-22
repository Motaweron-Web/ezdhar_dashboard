<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Users;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\DataTables;

class UsersController extends Controller
{
    use PhotoTrait;

    public function client(request $request)
    {
        if ($request->ajax()) {
            $clients = Users::where('user_type', 'client')->select('*');
            return Datatables::of($clients)
                ->addColumn('action', function ($clients) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $clients->id . '" data-title="' . $clients->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($clients) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . get_user_file($clients->image) . '">
                    ';
                })
                ->editColumn('created_at', function ($user) {
                return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
                })
                ->escapeColumns([])
                ->make(true);
        } else {

            return view('Admin.users.client');
        }

    } //end of index
    public function client_delete(Request $request)
    {
        $client = Users::where('id', $request->id)->first();

        $client->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);

    } //end of delete

    public function freelancer(request $request)
    {
        if ($request->ajax()) {
            $freelancers = Users::where('user_type', 'freelancer')->select('*');
            return Datatables::of($freelancers)
                ->addColumn('action', function ($freelancers) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $freelancers->id . '" data-title="' . $freelancers->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($freelancers) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . get_user_file($freelancers->image) . '">
                    ';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin.users.freelancer');
        }
    } //end of index
    public function freelancer_delete(Request $request)
    {
        $freelancer = Users::where('id', $request->id)->first();

        $freelancer->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);

    } //end of delete

    public function adviser(request $request)
    {
        if ($request->ajax()) {
            $advisers = Users::where('user_type', 'adviser')->select('*');
            return Datatables::of($advisers)
                ->addColumn('action', function ($advisers) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $advisers->id . '" data-title="' . $advisers->first_name . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($advisers) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="' . get_user_file($advisers->image) . '">
                    ';
                })
                ->editColumn('created_at', function ($user) {
                    return $user->created_at ? with(new Carbon($user->created_at))->format('m/d/Y') : '';
                })
                ->filterColumn('created_at', function ($query, $keyword) {
                    $query->whereRaw("DATE_FORMAT(created_at,'%m/%d/%Y') like ?", ["%$keyword%"]);
                })
                ->escapeColumns([])
                ->make(true);
        } else {
            return view('Admin.users.adviser');
        }
    } //end of index
    public function adviser_delete(Request $request)
    {
        $adviser = Users::where('id', $request->id)->first();

        $adviser->delete();
        return response(['message'=>'تم الحذف بنجاح','status'=>200],200);

    } //end of delete


} //end of class
