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
        Schema::create('allowance_transactions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('payroll_period_id')->constrained('payroll_periods')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('allowance_type_id')->constrained('allowance_types')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount', 10, 2);
            $table->decimal('taxable_amount', 10, 2)->nullable()->default(0);
            $table->decimal('non_taxable_amount', 10, 2)->nullable()->default(0);
            $table->boolean('is_day_based')->default(0);
            $table->integer('number_of_date')->nullable();
            $table->tinyInteger('status')->default(1); //0 for inactive 1 for active
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowance_transactions');
    }
};
