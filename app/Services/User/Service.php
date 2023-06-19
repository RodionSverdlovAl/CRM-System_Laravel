<?php

namespace App\Services\User;



use App\Models\User;

class Service
{
    public function update($data, User $employee)
    {
        $employee->update($data);
    }
}
