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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->string('emp_id')->unique()->index();
            $table->string('first_name');
            $table->string('father_name');
            $table->string('gfather_name');
            $table->boolean('sex')->default(0);
            $table->string('birth_date');
            $table->string('hired_date')->nullable();
            $table->string('tin_no')->nullable();
            $table->integer('cost_center')->nullable();
            $table->foreignId('tax_region_id')->constrained('tax_regions')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('grade_id')->constrained('grades')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('department_id')->constrained('departments')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('sub_department_id')->constrained('sub_departments')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('position_id')->constrained('positions')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('employment_type_id')->constrained('employment_types')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('citizenship_id')->constrained('citizenships')->onDelete('restrict')->onUpdate('cascade');
            $table->string('email')->nullable();
            $table->foreignId('bank_id')->constrained('banks')->onDelete('restrict')->onUpdate('cascade');
            $table->string('account_number')->nullable();

            $table->text('image')->nullable();
            $table->boolean('status')->default(0);
            $table->text('comment')->nullable();

            $table->softDeletes();
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('employees');
    }
};
