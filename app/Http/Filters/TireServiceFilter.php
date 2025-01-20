<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class TireServiceFilter extends AbstractFilter
{
    public const IMAGE = 'image';
    public const NAME = 'name';
    public const AREA_FROM = 'area_from';
    public const AREA_TO = 'area_to';
    public const FLOORS = 'floors';
    public const ROOMS = 'rooms';
    public const DESCRIPTION = 'description';


    protected function getCallbacks(): array
    {
        return [
            self::IMAGE => [$this, 'image'],
            self::NAME => [$this, 'name'],
            self::AREA_FROM => [$this, 'area_from'],
            self::AREA_TO => [$this, 'area_to'],
            self::FLOORS => [$this, 'floors'],
            self::ROOMS => [$this, 'rooms'],
        ];
    }

    public function image(Builder $builder, $value)
    {
        $builder->whereNot('image', 'NULL');
    }

    public function name(Builder $builder, $value)
    {
        $builder->whereRaw('LOWER(name) LIKE LOWER(?)', "%{$value}%")
            ->orderByRaw("
            CASE
                WHEN name = '{$value}' THEN 1
                WHEN name LIKE '{$value}%' THEN 2
                WHEN name LIKE '%{$value}%' THEN 3
                ELSE 4
            END")
            ->get();
    }

    public function area_from(Builder $builder, $value)
    {
        $builder->where('area', '>=', (float)$value);
    }

    public function area_to(Builder $builder, $value)
    {
        $builder->where('area', '<=', (float)$value);
    }

    public function rooms(Builder $builder, $value)
    {
        $builder->whereIn('rooms', $value);
    }
}
