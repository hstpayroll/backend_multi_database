<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('price_tags', function (Blueprint $table) {
            $table->id();
            $table->string('package_name')->unique();
            $table->unsignedInteger('minimum_employee'); 
            $table->unsignedInteger('maximum_employee');
            $table->decimal('price',10, 2);
            $table->string('description')->nullable();
            $table->boolean('status')->default(1); // Default value is 1 (true)
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('price_tags');
    }
};