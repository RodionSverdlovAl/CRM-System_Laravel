<?php

namespace App\Http\Controllers\Admin\Position;
use App\Models\Position;
use App\Models\User;


class EditController extends BaseController
{
    public function __invoke(Position $position)
    {
        return view('admin.position.edit', compact('position'));
    }
}
