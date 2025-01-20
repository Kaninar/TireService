<?php

namespace App\Http\Controllers;

use App\Http\Filters\TireServiceFilter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Models\TireService;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function __invoke()
    {
        $services = TireService::paginate(10);

        $distinct_rooms = TireService::getDistinctRooms();

        $area_bounds = TireService::getAreaBounds();

        return view("home_page", [
            "services" => $services,
            "distinct_rooms" => $distinct_rooms,
            "area_bounds" => $area_bounds
        ]);
    }
}
