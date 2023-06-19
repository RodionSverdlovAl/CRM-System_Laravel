<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class JobsController extends Controller
{
    public function __invoke()
    {
        // найти общую сумму за месяц
        $fullIncome ="";
        for ($i = 1; $i < 13; $i++) {
            $jobs = Job::where('month', $i)->get();
            $jobsCount = count($jobs);

            $item = "['".$this->renameMonth($i)."', ". $jobsCount.", 'silver'],";

            $fullIncome .= $item;
        }


        return view('admin.statistic.jobs', compact("fullIncome"));
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
