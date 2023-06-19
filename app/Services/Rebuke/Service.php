<?php

namespace App\Services\Rebuke;

use App\Models\Rebuke;

class Service
{
    public function store($data)
    {
        Rebuke::create($data);
    }

    public function update($data, Rebuke $post)
    {

    }
}
