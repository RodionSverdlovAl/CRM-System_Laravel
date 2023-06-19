<?php

namespace App\Http\Controllers\Admin\Rebuke;

use App\Http\Controllers\Admin\Employee\BaseController;
use App\Models\Rebuke;



class DestroyController extends BaseController
{
    public function __invoke(Rebuke $rebuke)
    {
        $rebuke->delete();
        return redirect()->route('admin.employee.show', $rebuke->user_id);
    }
}
