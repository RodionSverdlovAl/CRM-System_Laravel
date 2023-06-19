<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;

use App\Models\Position;
use App\Models\User;


class EditController extends BaseController
{
    public function __invoke(User $employee)
    {
        $positions = Position::all();
        return view('admin.employee.edit', compact('positions','employee'));
    }
}
