<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShiftAllowanceCalculationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shift_allowance_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('shift_allowance_type_id')->constrained('shift_allowance_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('payroll_period_id')->constrained('payroll_periods')->onDelete('restrict')->onUpdate('cascade');
            $table->decimal('value', 20, 2);
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shift_allowance_calculations');
    }
}
