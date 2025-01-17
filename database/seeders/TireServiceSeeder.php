<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Ramsey\Uuid\Type\Integer;
use App\Models\TireService;

class TireServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */

    public function run(): void
    {
        TireService::factory(10)->create();

        // DB::table('tire_services')->insert([
        //     'id' => id(),
        //     'name' => Str::random(50),
        //     "image" => string("image"),
        //     "rooms_count" => integer("rooms_count"),
        //     "floor" => Integer::random(10),
        //     "area" => integer("area"),
        //     "description" => string("description")
        // ]);
    }
}
