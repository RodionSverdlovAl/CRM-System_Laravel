<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Post;
use App\Models\Service;
use App\Models\User;


class ShowController extends Controller
{
    public function __invoke(Job $job)
    {
        //dd($job);
        $employee = User::where('id', $job->user_id)->firstOrFail();
        $service = Service::where('id', $job->service_id)->firstOrFail();
        $position = Position::where('id', $employee->position_id)->firstOrFail();
        // TODO: Implement __invoke() method.
        return view('admin.job.show',
            compact('employee', 'service', 'job', 'position'));
    }
}
