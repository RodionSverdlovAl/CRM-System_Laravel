<?php

namespace App\Http\Controllers\User\Job;

use App\Http\Controllers\Controller;
use App\Services\Job\Service;

class BaseController extends Controller
{

    public $service;

    public function __construct(Service $service)
    {

        $this->service = $service;
    }
}
