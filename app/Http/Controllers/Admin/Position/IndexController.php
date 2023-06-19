<?php

namespace App\Http\Controllers\Admin\Position;

use App\Http\Controllers\Controller;
use App\Models\Position;


class IndexController extends Controller
{
    public function __invoke()
    {
        $positions = Position::all();
        return view('admin.position.index' , compact('positions'));
    }
}
