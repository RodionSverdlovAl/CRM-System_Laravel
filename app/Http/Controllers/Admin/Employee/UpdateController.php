<?php

namespace App\Http\Controllers\Admin\Employee;
use App\Http\Requests\Employee\UpdateRequest;
use App\Models\User;


class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request,User $employee)
    {
        $data = $request->validated();


        $this->service->update($data,$employee);

        return redirect()->route('admin.employee.show',$employee->id);
    }
}
