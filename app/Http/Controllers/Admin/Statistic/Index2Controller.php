<?php


namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class Index2Controller extends Controller
{
    public function __invoke()
    {
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
            $sum =0;
            foreach ($hourPaydayArray as $item){
                $sum +=$item['sum'];
            }

            $array = [];
            $array['employee'] =  $employee->name. ' ' . $employee->surname;
            $array['position'] = Position::where('id', $employee->position_id)->firstOrFail()->title;
            $array['sum'] = $sum;
            $array['count_jobs'] = count(Job::where('user_id', $employee->id)->get());
            $array['count_hour'] = round($allWorkTime/60,2);
            $array['count_rebukes'] = $countRebukes;
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
        return view('admin.statistic.index2' , compact('data'));
    }


    // все выполненные работы проходим по ним циклом и смотрим на их стоимость
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
