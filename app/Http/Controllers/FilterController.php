<?php

namespace App\Http\Controllers;

use App\Http\Filters\TireServiceFilter;
use App\Http\Requests\FilterRequest;
use App\Models\TireService;
use Illuminate\Http\Request;

class FilterController extends Controller
{
    public function __invoke(FilterRequest $request)
    {
        $data = $request->validated();

        $filter = app()->make(TireServiceFilter::class, ['queryParams' => array_filter($data)]);
        $services = TireService::filter($filter)->paginate(10)->withQueryString();

        $cards = view('service_card', ['services' => $services])->render();
        $pagination = view('pagination', ['services' => $services])->render();

        return response()->json([
            'html' => $cards,
            'pagination' => $pagination,
        ]);
    }
}
