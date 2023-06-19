<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Post;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class ShowController extends Controller
{
    public function __invoke(User $employee)
    {

        $position = Position::where('id', $employee->position->id)->firstOrFail();
        $services = Service::all();
        $jobs = Job::where('user_id', $employee->id)->get();
        $jobsForPrint = Job::where('user_id', $employee->id)->paginate(6);

        $rebukes = Rebuke::where('user_id', $employee->id)->get();
        $allWorkTime = 0;
        foreach ($jobs as $job){
            $allWorkTime += $job->work_time;
        }

        $fullIncome ="";
        for ($i = 1; $i < 13; $i++) {
            $jobsCount = 0;
            $jobsForIncome = Job::where('month', $i)->get();
            foreach ($jobsForIncome as $job){
                if($job->user_id == $employee->id){
                    $jobsCount++;
                }
            }
            $item = "['".$this->renameMonth($i)."', ". $jobsCount.", 'silver'],";

            $fullIncome .= $item;
        }

        return view('admin.employee.show',
            compact('employee', 'position','services','jobs','allWorkTime', 'rebukes', "jobsForPrint","fullIncome"));
    }

    private function renameMonth($monthNumber){
        switch ($monthNumber){
            case 1: return "Янв.";
            case 2: return "Фев.";
            case 3: return "Мар.";
            case 4: return "Апр.";
            case 5: return "Май";
            case 6: return "Июн.";
            case 7: return "Июл.";
            case 8: return "Авг.";
            case 9: return "Сен.";
            case 10: return "Окт.";
            case 11: return "Ноя.";
            case 12: return "Дек.";
        }
        return "";
    }

}
