<?php

namespace App\Http\Controllers\Admin\Rebuke;

use App\Http\Controllers\Controller;
use App\Services\Rebuke\Service;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
