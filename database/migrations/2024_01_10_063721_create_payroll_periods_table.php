<?php

use App\Models\FiscalYear;
use App\Models\IncomeTax;
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
        Schema::create('payroll_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(IncomeTax::class);
            $table->foreignId('payroll_type_id')->constrained();
            $table->foreignIdFor(FiscalYear::class)->constrained();
            $table->string('name');
            $table->date('start_date');
            $table->date('end_date');
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
        Schema::dropIfExists('payroll_periods');
    }
};
