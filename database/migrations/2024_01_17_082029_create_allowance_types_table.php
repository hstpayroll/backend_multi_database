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
        Schema::create('allowance_types', function (Blueprint $table) {
            $table->id();
            $table->foreignId('main_allowance_id')->constrained('main_allowances');
            $table->string('name');
            $table->tinyInteger('taxability')->default(1); // 1 taxable, 2 non-taxable 3 semi-taxable 4 tax coved by employer
            $table->decimal('tax_free_amount', 10, 2)->default(0); // if it is semi taxable it value is above 0 else 0
            $table->boolean('value_type')->default(1); // 1 absolute value 2 percentage
            $table->tinyInteger('status')->default(1);
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict')->onUpdate('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('allowance_types');
    }
};
