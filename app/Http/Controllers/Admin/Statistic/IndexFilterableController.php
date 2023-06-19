<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statistic\FilterRequest;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class IndexFilterableController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $dataMonth = $request->validated();
        $employees = User::where('role', 'user')->get();
        $data = [];



        foreach ($employees as $employee){
            $jobsS = Job::where('user_id', $employee->id)->get();
            $allWorkTime = 0;
            foreach ($jobsS as $job){
                $allWorkTime += $job->work_time;
            }
            $countRebukes = count(Rebuke::where('user_id',  $employee->id)->get());

            $hourPaydayArray = [];
            $allRebukes = Rebuke::where('user_id',  $employee->id)->get();
            $empPosSalary = Position::where('id', $employee->position_id)->firstOrFail()->salary;
            for($i=1;$i<13;$i++){
                $jobs = Job::where('user_id', $employee->id)->get();

                $empPosSalary = Position::where('id', $employee->position_id)->firstOrFail()->salary;
                $thisMonthJobs = [];

                foreach($jobs as $job){ // берем работы за конкретный месяц
                    if($job->month == $i){
                        $thisMonthJobs[] = $job;
                    }
                }
                $monthWorkTime = 0;
                foreach ($thisMonthJobs as $job){ // вычисляем сколько он отработал за месяц
                    $monthWorkTime += $job->work_time;
                }

                $countRebukesForMonth = 0;
                foreach ($allRebukes as $rebuke){ // смотрим сколько выговоров за этот месяц
                    $rebuke->date = mb_substr($rebuke->date, 3,2);
                    $rebukeMonth = (int)$rebuke->date;
                    if($rebukeMonth == $i){
                        $countRebukesForMonth++;
                    }
                }
                //$thisMonthSalary = $this->calcHourPayday($monthWorkTime, $empPosSalary,$countRebukesForMonth);

                // теперь составляем айтем для массива

                $monthItem = [];

                $monthItem['sum'] = $this->calcHourPayday($monthWorkTime/60, $empPosSalary,$countRebukesForMonth);
                $monthItem['count_jobs'] = count($thisMonthJobs);
                $monthItem['count_hour'] = round($monthWorkTime/60,2);
                $monthItem['count_rebukes'] = $countRebukesForMonth;
                $hourPaydayArray[] = $monthItem;
            }

            // ВЫЧИСЛЯЕМ ОБЩУЮ СУММУ

//            dd($hourPaydayArray[(int)$dataMonth['month']-1]);
            $sum = $hourPaydayArray[(int)$dataMonth['month']-1]['sum'];

            $array = [];
            $array['employee'] =  $employee->name. ' ' . $employee->surname;
            $array['position'] = Position::where('id', $employee->position_id)->firstOrFail()->title;
            $array['sum'] = $sum;
            $array['count_jobs'] = $hourPaydayArray[(int)$dataMonth['month']-1]['count_jobs'];
            $array['count_hour'] =$hourPaydayArray[(int)$dataMonth['month']-1]['count_hour'];
            $array['count_rebukes'] = $hourPaydayArray[(int)$dataMonth['month']-1]['count_rebukes'];
            $array['info_by_month'] =  $hourPaydayArray;

            $data[] = $array;
//            $info = [];
//            $positionTitle = Position::where('id', $employee->position_id)->firstOrFail()->title;
//            $empPosSalary = Position::where('id', $employee->position_id)->firstOrFail()->salary;
//            $countRebukes = count(Rebuke::where('user_id',  $employee->id)->get());
//            $jobs = Job::where('user_id', $employee->id)->get();
//            $countJobs = count($jobs);
//            $allWorkTime = 0;
//            foreach ($jobs as $job){
//                $allWorkTime += $job->work_time;
//            }
//            $info['emploee'] = $employee->name. ' ' . $employee->surname;
//            $info['position'] = $positionTitle;
//            $info['sum'] = $this->calcHourPayday($allWorkTime/60, $empPosSalary, $countRebukes);
//            $info['count_jobs'] = $countJobs;
//            $info['count_hour'] = round($allWorkTime/60,2);
//            $info['count_rebukes'] = $countRebukes;
//            $hourPaydayArray[] = $info;
        }
        return view('admin.statistic.index' , compact('data'));
    }

    private function calcHourPayday($hours, $hourSalary, $rebukes){
        if($rebukes == 0){
            return $hours * $hourSalary;
        }
        if($rebukes == 1){
            return ($hours * $hourSalary)*0.8;
        }
        if($rebukes >1 ){
            return ($hours * $hourSalary)*0.5;
        }
        return 0;
    }

}
