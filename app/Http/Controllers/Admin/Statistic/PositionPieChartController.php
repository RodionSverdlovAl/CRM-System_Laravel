<?php

namespace App\Http\Controllers\Admin\Statistic;

use App\Http\Controllers\Controller;
use App\Models\Job;
use App\Models\Position;
use App\Models\Rebuke;
use App\Models\Service;
use App\Models\User;


class PositionPieChartController extends Controller
{
    public function __invoke()
    {
         $employees = User::where('role', 'user')->get();
         $positions = Position::all();
         $data ="";
         foreach ($positions as $position){
             $empCount =0;
             foreach ($employees as $employee){
                 if($employee->position_id == $position->id){
                     $empCount++;
                 }
             }
             $item = "['".$position->title."',".    " ".$empCount."],";
             $data .= $item;
         }

        return view('admin.statistic.PositionPieChart', compact('data'));
    }
}
