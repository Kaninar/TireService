<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TireService;

class HomeController extends Controller
{
    public function index()
    {
        $services = TireService::paginate(10);
        return view("home_page", [
            "tire_services" => $services,
            "distinct_rooms" => TireService::distinct()->orderBy('rooms_count')->get(['rooms_count'])
        ]);
    }
}
