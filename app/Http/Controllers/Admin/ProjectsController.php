<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreProjects;
use App\Models\Category;
use App\Models\Project;
use App\Traits\PhotoTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

class ProjectsController extends Controller
{
    use PhotoTrait;

    public function index(request $request)
    {
        if($request->ajax()) {
            $projects = Project::select('*');
            return Datatables::of($projects)
                ->addColumn('action', function ($projects) {
                    return '
                            <button class="btn btn-pill btn-danger-light" data-toggle="modal" data-target="#delete_modal"
                                    data-id="' . $projects->id . '" data-title="' . $projects->title_ar . '">
                                    <i class="fas fa-trash"></i>
                            </button>
                       ';
                })
                ->editColumn('image', function ($projects) {
                    return '
                    <img alt="image" onclick="window.open(this.src)" class="avatar avatar-md rounded-circle" src="'.get_user_file($projects->image).'">
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
        }else{
            return view('Admin.project.index');
        }
    } //end of index


    public function delete(Request $request)
    {
        $projects = Project::where('id', $request->id)->first();

            $projects->delete();
            return response(['message'=>'تم الحذف بنجاح','status'=>200],200);
    } //end of delete
}
