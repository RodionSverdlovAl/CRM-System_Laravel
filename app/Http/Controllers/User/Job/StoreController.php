<?php

namespace App\Http\Controllers\User\Job;

use App\Http\Requests\Job\StoreRequest;



class StoreController extends BaseController
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        $this->service->store($data);
        return redirect()->route('user.profile');
    }
}
