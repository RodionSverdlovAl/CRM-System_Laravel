<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class IncomeController extends Controller
{
    public function __invoke()
    {
        // найти общую сумму за месяц
        $fullIncome ="";
        for ($i = 1; $i < 13; $i++) {
            $jobs = Job::where('month', $i)->get();
            $services = Service::all();
            $monthIncome =0;
            foreach ($jobs as $job) {
                foreach ($services as $service){
                    if($job->service_id == $service->id){
                        if($job->complexity == 1){
                            $monthIncome+=$service->price;
                        }
                        if($job->complexity == 2){
                            $monthIncome+=$service->price * 1.5;
                        }
                        if($job->complexity == 3){
                            $monthIncome+=$service->price * 2;
                        }

                    }
                }
            }
            $item = "['".$this->renameMonth($i)."', ". $monthIncome.", 'silver'],";

            $fullIncome .= $item;
        }


        return view('admin.statistic.income', compact("fullIncome"));
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


//
//      ["Янв.", 1300, "silver"],["Фев.", 940, "silver"],["Мар.", 6100, "silver"],
//                    ["Апр.", 4400, "silver"],
//                    ["Май", 5400, "silver"],
//                    ["Июн.", 1200, "silver"],
//                    ["Июл.", 8600, "silver"],
//                    ["Авг.", 0, "silver"],
//                    ["Сен.", 0, "silver"],
//                    ["Окт.", 0, "silver"],
//                    ["Ноя.", 0, "silver"],
//                    ["Дек.", 0, "silver"],
