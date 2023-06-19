<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Statistic\FilterRequest;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class Index2FilterableController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $dataMonth = $request->validated();
        $employees = User::where('role', 'user')->get();
        $data = [];
        $services = Service::all();


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
                $monthItem['sum'] = $this->calcJobsPayday($thisMonthJobs, $countRebukesForMonth,$services);
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
        }
        return view('admin.statistic.index2' , compact('data'));
    }

    private function calcJobsPayday($jobs, $rebukes, $services)
    {
        $sum =0;
        if($rebukes == 0){
            foreach ($jobs as $job){
                foreach ($services as $service){
                    if($job->service_id == $service->id){
                        if($job->complexity == 1){
                            $sum +=$service->price;
                        }
                        if($job->complexity == 2){
                            $sum +=$service->price * 1.15;
                        }
                        if($job->complexity == 3){
                            $sum +=$service->price * 1.20;
                        }

                    }
                }
            }
            return $sum * 0.2;
        }
        if($rebukes == 1){
            foreach ($jobs as $job){
                foreach ($services as $service) {
                    if ($job->service_id == $service->id) {
                        if($job->complexity == 1){
                            $sum +=$service->price;
                        }
                        if($job->complexity == 2){
                            $sum +=$service->price * 1.15;
                        }
                        if($job->complexity == 3){
                            $sum +=$service->price * 1.20;
                        }
                    }
                }
            }
            return $sum * 0.15;
        }
        if($rebukes > 1){
            foreach ($jobs as $job){
                foreach ($services as $service) {
                    if ($job->service_id == $service->id) {
                        if($job->complexity == 1){
                            $sum +=$service->price;
                        }
                        if($job->complexity == 2){
                            $sum +=$service->price * 1.15;
                        }
                        if($job->complexity == 3){
                            $sum +=$service->price * 1.20;
                        }
                    }
                }
            }
            return $sum * 0.1;
        }
        return 0;
    }

}
