<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     * this table is pivot for employee  and overtime type
     */

    public function up(): void
    {
        Schema::create('over_time_calculations', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id')->constrained('employees')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('over_time_type_id')->constrained('over_time_types')->onDelete('restrict')->onUpdate('cascade');
            $table->date('ot_date');
            $table->decimal('ot_hour', 10, 2)->default(0);
            $table->decimal('ot_value', 10, 2)->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('over_time_calculations');
    }
};
