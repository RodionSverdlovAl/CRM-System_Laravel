<?php

namespace App\Http\Controllers\Admin\Rebuke;

use App\Http\Controllers\Admin\Rebuke\BaseController;
use App\Http\Controllers\Controller;
use App\Http\Requests\Rebuke\StoreRequest;
use App\Models\Rebuke;


class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();

        $this->service->store($data);
        return redirect()->route('admin.employee.show', $data['user_id']);
    }
}
