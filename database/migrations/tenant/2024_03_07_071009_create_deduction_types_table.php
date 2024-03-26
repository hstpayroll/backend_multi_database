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
        Schema::create('deduction_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_deduction_id')->constrained()->onDelete('cascade'); 
            $table->string('name');
            $table->text('description')->nullable();
            $table->boolean('is_continuous')->default('0');
            $table->boolean('is_employee_specific')->default('0');
            $table->boolean('value_type')->default('0')->nullable();
            $table->decimal('value')->default('0.00')->nullable();
            $table->boolean('status')->default('1');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deduction_types');
    }
};
