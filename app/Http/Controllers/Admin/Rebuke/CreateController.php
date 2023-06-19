<?php

namespace App\Http\Controllers\Admin\Rebuke;

use App\Http\Controllers\Controller;
use App\Models\User;

class CreateController extends Controller
{
    public function __invoke(User $employee)
    {

        return view('admin.rebuke.create', compact('employee'));
    }
}
