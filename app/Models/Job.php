<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;


// Job это у нас Наряд
class Job extends Model
{
    use HasFactory;
    use SoftDeletes;
    use Filterable;
    protected $guarded = false;


    // у наряда есть рабочий который его выполнил
    public function employee()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    // у наряда есть выполненная услуга
    public function service()
    {
        return $this->belongsTo(Service::class, 'service_id', 'id');
    }
}
