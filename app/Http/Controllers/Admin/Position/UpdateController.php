<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Requests\Position\UpdateRequest;
use App\Models\Position;
use App\Models\User;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,Position $position)
    {
        $data = $request->validated();

        $this->service->update($data, $position);

        return redirect()->route('positions.index');
    }
}
