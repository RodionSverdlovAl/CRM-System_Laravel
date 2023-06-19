<?php

namespace App\Http\Controllers\User\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Service;


class IndexController extends Controller
{
    public function __invoke()
    {
        $userId = auth()->user()->id;
        $jobs = Job::where('user_id', $userId)->get();
        dd($jobs);
        $services = Service::all();
        return view('user.job.index' , compact('jobs', 'services'));
    }
}
