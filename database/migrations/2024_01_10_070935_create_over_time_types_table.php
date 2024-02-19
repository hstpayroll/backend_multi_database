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
        Schema::create('over_time_types', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->decimal('rate', 10, 2);
            $table->foreignId('company_id')->constrained('companies')->onDelete('restrict')->onUpdate('cascade');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('over_time_types');
    }
};
