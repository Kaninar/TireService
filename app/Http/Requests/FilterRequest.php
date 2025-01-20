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
                "name" => "max:255",
                "image" => "",
                "area_from" => "",
                "area_to" => "",
                "rooms" => ""
            ];
    }
}
