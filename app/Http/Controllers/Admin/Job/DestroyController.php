<?php

namespace App\Http\Controllers\Admin\Job;

use App\Http\Controllers\Admin\Service\BaseController;
use App\Models\Job;




class DestroyController extends BaseController
{
    public function __invoke(Job $job)
    {
        $job->delete();
        return redirect()->route('admin.job.index');
    }
}
