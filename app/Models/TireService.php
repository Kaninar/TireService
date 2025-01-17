<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TireService extends Model
{
    use HasFactory;

    protected $connection = 'pgsql';
    protected $table_name = 'tire_services';
    public $incrementing = true;
    protected $primaryKey = 'id';
    public $timestamps = false;
}
