<?php

namespace App\Http\Controllers;

use Request;
use Carbon\Carbon;
use DB;
use App\Department;
use Auth;

class DepartmentController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {    
     $dep = DB::select("select * from department order by dep_name");

        return view('department',['dep'=> $dep]);
    }

    public function store()
    {
        $dep = new Department;
        $dep->dep_name = Request::input('dep_name');
        $dep->is_ubtz = Request::input('is_ubtz');
        $dep->save();
        return Redirect('department');
    }

}
