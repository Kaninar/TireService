<?php

namespace App\Http\Controllers;

use App\Models\TireService;
use Illuminate\Http\Request;


class TireServiceController extends Controller
{
    public function getService()
    {
        $services = TireService::all();
        dd($services);
    }
}
