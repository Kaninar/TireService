<?php

namespace App\Http\Requests;

use App\Models\TireService;
use Illuminate\Foundation\Http\FormRequest;

class FilterRequest extends FormRequest
{
    public function rules()
    {
        return
            [
                "name" => "string",
                "image" => "bool",
                "area_from" => "int",
                "area_to" => "int",
                "rooms" => "array"
            ];
    }
}
