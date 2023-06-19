<?php

namespace App\Http\Controllers\Admin\Service;

use App\Http\Controllers\Admin\Service\BaseController;
use App\Http\Requests\Service\StoreRequest;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);

        return redirect()->route('admin.service.index');
    }
}
