<?php

namespace App\Exports;

use App\Models\Position;
use App\Models\User;
use Maatwebsite\Excel\Concerns\FromCollection;

class UsersExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        $data = collect();
        $employees = User::where('role', 'user')->get();
        foreach ($employees as $employee){
            $item['name'] = $employee->name;
            $item['surname'] = $employee->surname;
            $item['position'] = Position::where('id', $employee->position_id)->firstOrFail()->title;
            $item['email'] = $employee->email;
            $data[] = $item;
        }
        return $data;
    }
}
