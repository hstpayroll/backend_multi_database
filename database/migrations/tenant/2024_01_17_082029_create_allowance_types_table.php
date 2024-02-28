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
            $table->foreignId('main_allowance_id')->constrained('main_allowances');
            $table->string('name');
            $table->tinyInteger('taxability')->default(1);
            $table->decimal('tax_free_amount', 10, 2)->default(0);
            $table->boolean('value_type')->default(1);
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
