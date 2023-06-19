<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;


class CreateController extends Controller
{
    public function __invoke()
    {
        return view('admin.service.create');
    }
}
