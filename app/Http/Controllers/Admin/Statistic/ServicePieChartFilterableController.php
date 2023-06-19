<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Http\Filters\JobFilter;
use App\Http\Requests\Statistic\FilterRequest;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class ServicePieChartFilterableController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();
        $filter = app()->make(JobFilter::class, ['queryParams'=>array_filter($data)]);
        $jobs = Job::filter($filter)->get();
        $services = Service::all();
        $data = "";
        foreach($services as $service){
            $jobsCount =0;
            foreach ($jobs as $job){
                if($job->service_id == $service->id){
                    $jobsCount++;
                }
            }
            $item = "['".$service->title."',".    " ".$jobsCount."],";
            $data .= $item;
        }

        //dd($data);
        return view('admin.statistic.ServicePieChart', compact('data'));
    }
}
