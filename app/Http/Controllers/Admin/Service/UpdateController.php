<?php

namespace App\Http\Controllers\Admin\Service;


use App\Http\Requests\Service\UpdateRequest;
use App\Models\Service;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,Service $service)
    {
        $data = $request->validated();

        $this->service->update($data, $service);

        return redirect()->route('admin.service.index');
    }
}
