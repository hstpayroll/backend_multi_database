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
        Schema::create('loans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees');
            $table->foreignId('loan_type_id')->constrained('loan_types')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('amount', 10, 2);
            $table->date('start_date');
            $table->date('expected_end_date');
            $table->integer('duration_months')->default(0);
            $table->text('description')->nullable();
            $table->tinyInteger('status')->default(1);
            $table->date('termination_date')->nullable(); //if the status is finished this value must have a value
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loans');
    }
};
