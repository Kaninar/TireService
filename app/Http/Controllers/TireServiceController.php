<?php

namespace App\Http\Controllers;

use App\Models\TireService;
use Illuminate\Http\Request;

class TireServiceController extends Controller
{
    public function index()
    {
        $services = TireService::all();
        return view("service.index", compact('services'));
    }

    public function create()
    {
        return view("service.create");
    }

    public function store(TireService $service) {}

    public function show(TireService $service)
    {
        $service->find($service);
    }

    public function edit()
    {
        return view("edit");
    }

    public function update(TireService $service) {}

    public function destroy(TireService $service)
    {
        $service->delete();
    }
}
