<?php

namespace App\Services\Job;

use App\Models\Job;

class Service
{
    public function store($data)
    {
        $userId = auth()->user()->id;
        $data['user_id'] = $userId;
        Job::create($data);
    }
}
