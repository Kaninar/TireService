<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TireService extends Model
{
    use HasFactory;
    use Filterable;

    protected $table = "tire_services";

    public static function getDistinctRooms()
    {
        return self::select('rooms as value', DB::raw('COUNT(rooms) as count'))
            ->groupBy('rooms')
            ->orderBy('rooms', 'ASC')
            ->get();
    }

    public static function getAreaBounds()
    {
        return self::selectRaw('MAX(area) as max_area, MIN(area) as min_area')
            ->first();
    }
}
