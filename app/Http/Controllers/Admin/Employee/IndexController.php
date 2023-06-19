<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\Position;
use App\Models\User;


class IndexController extends Controller
{
    public function __invoke()
    {
        $employees = User::where('role', 'user')->get();
        $positions = Position::all();
        return view('admin.employee.index' , compact('employees','positions'));
    }
}
