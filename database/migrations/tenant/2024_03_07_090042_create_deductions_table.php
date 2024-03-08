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
            $table->foreignId('deduction_type_id')->constrained('deduction_types')->onDelete('restrict')->onUpdate('cascade');
            $table->boolean('value_type')->default(0); //0 for fixed value, 1 for percentage
            $table->decimal('value', 10, 2)->default(0)->nullable(); //how can it deduct from your salary if it is in % deduct in % or the actual value
            $table->tinyInteger('status')->default(1);
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
