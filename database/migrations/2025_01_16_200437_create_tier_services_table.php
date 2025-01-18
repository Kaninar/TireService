<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('tire_services', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('image')
                ->nullable();
            $table->integer('rooms');
            $table->integer('floors');
            $table->integer('area');
            $table->string('description')
                ->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tire_services');
    }
};
