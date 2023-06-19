<?php

namespace App\Http\Filters;
use Illuminate\Database\Eloquent\Builder;

class JobFilter extends AbstractFilter
{

    public const MONTH = 'month';

    protected function getCallbacks(): array
    {
        // TODO: Implement getCallbacks() method.
        return [
            self::MONTH => [$this, 'month']
        ];
    }

    public function month(Builder $builder, $value)
    {
        $builder->where('month', $value);
    }
}
