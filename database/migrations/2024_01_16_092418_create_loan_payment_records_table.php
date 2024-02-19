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
        Schema::create('loan_payment_records', function (Blueprint $table) {
            $table->id();
            $table->foreignId('loan_id')->constrained('loans');
            $table->decimal('amount_payed', 10, 2);
            $table->decimal('outstanding_amount', 10, 2);
            $table->boolean('is_partial')->default(false);
            $table->boolean('is_missed')->default(false);
           $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('loan_payment_records');
    }
};
