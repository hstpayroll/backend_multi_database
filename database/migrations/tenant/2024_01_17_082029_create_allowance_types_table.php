<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

    public function up(): void
    {
        Schema::create('allowance_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_allowance_id')->constrained('main_allowances')->onDelete('restrict')->onUpdate('cascade');
            $table->string('name');
            $table->tinyInteger('taxability')->default(1);
            $table->decimal('tax_free_amount', 10, 2)->default(0)->nullable();
            $table->boolean('value_type')->default(0); //0 for fixed value, 1 for percentage
            $table->decimal('value', 10, 2)->default(0)->nullable(); //how can it deduct from your salary if it is in % deduct in % or the actual value
            $table->tinyInteger('is_recurrent')->default(0); //0 for fixed time, 1 yes recurrent
            $table->tinyInteger('status')->default(1);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('allowance_types');
    }
};
