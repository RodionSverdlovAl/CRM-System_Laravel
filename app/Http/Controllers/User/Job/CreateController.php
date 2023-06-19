<?php

namespace App\Http\Controllers\User\Job;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Service;


class CreateController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();
        return view('user.job.create', compact('services'));
    }
}
