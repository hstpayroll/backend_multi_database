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
        Schema::create('payroll_names', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->datetime('start_date');
            $table->datetime('end_date')->nullable();
            $table->text('details');
            $table->tinyInteger('status')->default(1); //0 for expired and 1 for active

            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payroll_names');
    }
};
