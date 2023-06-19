<?php

namespace App\Services\Position;

use App\Models\Position;

class Service
{
    public function store($data)
    {
        Position::firstOrCreate($data);
    }

    public function update($data, Position $position){
        $position->update($data);
    }
}
