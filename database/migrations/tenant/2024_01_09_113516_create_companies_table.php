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
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('address')->nullable();
            $table->string('tin')->nullable();
            $table->text('logo')->nullable();
            $table->text('website')->nullable();
            $table->text('email')->nullable();
            $table->text('phone_number')->nullable();
            $table->text('address_line')->nullable();
            $table->text('city')->nullable();
            $table->text('sub_city')->nullable();
            $table->text('kebele')->nullable();
            $table->text('woreda')->nullable();
            $table->text('house_no')->nullable();
            $table->text('fax')->nullable();
            $table->foreignId('currency_id')->nullable()->constrained('currencies')->onDelete('restrict')->onUpdate('cascade');
            $table->foreignId('calendar_id')->nullable()->constrained('calendars')->onDelete('restrict')->onUpdate('cascade');
            $table->text('description')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
