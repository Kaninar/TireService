<?php

namespace App\Http\Controllers;

use App\Http\Filters\TireServiceFilter;
use App\Http\Requests\FilterRequest;
use Illuminate\Http\Request;
use App\Models\TireService;

class HomeController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(TireServiceFilter::class, ['queryParams' => array_filter($data)]);
        $services = TireService::filter($filter)->paginate(10);

        $distinct_rooms = TireService::distinct()->orderBy('rooms_count')->get(['rooms_count']);

        return view("home_page", [
            "services" => $services,
            "distinct_rooms" => $distinct_rooms
        ]);
    }
}
