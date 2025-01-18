<?php


namespace App\Http\Filters;


use Illuminate\Database\Eloquent\Builder;

class TireServiceFilter extends AbstractFilter
{
    public const IMAGE = 'image';
    public const NAME = 'name';
    public const AREA_FROM = 'area';
    public const AREA_TO = 'area';
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
        $builder->whereRaw("LOWER('name') LIKE ?", ['%{$value}%'])
            ->orderByRaw("
                CASE
                    WHEN LOWER('name') = '{$value}' THEN 1
                    WHEN LOWER('name') LIKE '{$value}%' THEN 2
                    WHEN LOWER('name') LIKE '%{$value}%' THEN 3
                    ELSE 4
                END
            ")
            ->get();
    }

    public function area_from(Builder $builder, $value)
    {
        $builder->where('area', '>=', $value);
    }

    public function area_to(Builder $builder, $value)
    {
        $builder->where('area', '>=', $value);
    }

    public function rooms(Builder $builder, $value)
    {
        $builder->whereIn('rooms', $value);
    }
}
