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
        Schema::create('deductions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('deduction_type_id')->constrained('deduction_types')->onDelete('restrict')->onUpdate('cascade');
            $table->text('name');
            $table->decimal('amount', 10, 2);
            $table->date('start_date');
            $table->date('expected_end_date');
            $table->integer('duration_months')->default(0);
            $table->decimal('monthly_installment', 10, 2)->default(0);
            $table->text('description')->nullable();
            $table->date('termination_date')->nullable(); //if the status is finished this value must have a value
            $table->tinyInteger('status')->default(1); // 1 = active, 0 = inactive 3 = finished 4 = terminated 5 = cancelled
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('deductions');
    }
};
