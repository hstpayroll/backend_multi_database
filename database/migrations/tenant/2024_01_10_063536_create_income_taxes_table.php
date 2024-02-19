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
        Schema::create('income_taxes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_name_id')->constrained();
            $table->text('name');
            $table->decimal('min_income', 10, 2);
            $table->decimal('max_income', 10, 2)->nullable();
            $table->decimal('tax_rate', 5, 2);
            $table->decimal('deduction');
            $table->text('details')->nullable();
            $table->tinyInteger('status')->default(1); 
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_taxes');
    }
};
