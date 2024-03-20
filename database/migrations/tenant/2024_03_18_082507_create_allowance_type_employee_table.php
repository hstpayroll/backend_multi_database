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
        Schema::create('allowance_type_employee', function (Blueprint $table) {
            $table->foreignId('allowance_type_id')->constrained();
            $table->foreignId('employee_id')->constrained();
            $table->integer('number_of_days')->nullable();
            $table->decimal('value_in_birr')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowance_type_employee');
    }
};
