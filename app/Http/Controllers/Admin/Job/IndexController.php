<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Service;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke()
    {
        $jobs = Job::paginate(10);
        $employees = User::where('role', 'user')->get();
        $services = Service::all();
        $positions = Position::all();

        return view('admin.job.index', compact('employees', 'positions', 'services', 'jobs'));
    }
}
