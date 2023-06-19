<?php

namespace App\Http\Controllers\Admin\Service;
use App\Http\Controllers\Admin\Position\BaseController;
use App\Models\Service;


class EditController extends BaseController
{
    public function __invoke(Service $service)
    {
        return view('admin.service.edit', compact('service'));
    }
}
