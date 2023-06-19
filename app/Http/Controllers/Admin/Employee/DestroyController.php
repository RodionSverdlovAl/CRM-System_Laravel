<?php

namespace App\Http\Controllers\Admin\Employee;

use App\Http\Controllers\Controller;
use App\Models\User;


class DestroyController extends BaseController
{
    public function __invoke(User $employee)
    {

        $employee->jobs()->forceDelete();
        $employee->delete();
        return redirect()->route('admin.employee.index');
    }
}
