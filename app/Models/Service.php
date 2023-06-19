<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Service extends Model
{
    use HasFactory;
    use SoftDeletes;
    protected $guarded = false;

    // у услуги есть выполненные наряды
    public function jobs()
    {
        return $this->hasMany(Job::class,'service_id', 'id');
    }
}
