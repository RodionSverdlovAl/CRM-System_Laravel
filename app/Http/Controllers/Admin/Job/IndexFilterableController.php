<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Http\Filters\JobFilter;
use App\Http\Requests\Job\FilterRequest;
use App\Models\Job;
use App\Models\Position;
use App\Models\Service;
use App\Models\User;


class IndexFilterableController extends Controller
{
    public function __invoke(FilterRequest $request)
    {

        $data = $request->validated();

        $filter = app()->make(JobFilter::class, ['queryParams'=>array_filter($data)]);
        $jobs = Job::filter($filter)->paginate(10);
        $employees = User::where('role', 'user')->get();
        $services = Service::all();
        $positions = Position::all();

        return view('admin.job.index', compact('employees', 'positions', 'services', 'jobs'));
    }
}
