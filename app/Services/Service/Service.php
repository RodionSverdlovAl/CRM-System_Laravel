<?php

namespace App\Services\Service;


class Service
{
    public function store($data)
    {
        \App\Models\Service::create($data);
    }

    public function update($data,  \App\Models\Service $service){
        $service->update($data);
    }
}
