<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Controller;
use App\Models\Service;


class IndexController extends Controller
{
    public function __invoke()
    {
        $services = Service::all();
        return view('admin.service.index' , compact('services'));
    }
}
