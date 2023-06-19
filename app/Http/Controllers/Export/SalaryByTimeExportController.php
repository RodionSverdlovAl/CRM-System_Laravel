<?php

namespace App\Http\Controllers\Export;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Exports\SalaryByTimeExport;
use Maatwebsite\Excel\Facades\Excel;
class SalaryByTimeExportController extends Controller
{
    public function export()
    {
        return Excel::download(new SalaryByTimeExport(), 'salaryByTime.xlsx');
    }
}
