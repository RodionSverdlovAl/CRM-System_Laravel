<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Position;
use App\Models\Service;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $employees = User::where('role', 'user')->get();
        $positions = Position::all();
        $services = Service::all();
        $jobs = Job::all();
        return view('admin.admin', compact('employees', 'positions', 'services', 'jobs'));
    }
}
