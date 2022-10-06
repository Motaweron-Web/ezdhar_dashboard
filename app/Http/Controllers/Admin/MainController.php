<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\ContactUs;
use App\Models\Project;
use App\Models\Users;

class MainController extends Controller
{
    public function index()
    {
        $projects = Project::all();
        $contactus = ContactUs::all();
        $category = Category::all();
        $users = Users::all();
        return view('Admin.index',compact([
            'projects',
            'category',
            'users',
            'contactus',
        ]));
    }
}
