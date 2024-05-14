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
        Schema::create('payrolls', function (Blueprint $table) {
            $table->id();
            $table->string('month');
            $table->string('name');
            $table->string('tag');
            $table->string('count');
            $table->string('holiday');
            $table->string('late');
            $table->string('salary');
            $table->string('holiday_salary');
            $table->string('bonus');
            $table->string('total_salary');
            $table->string('cut');
            $table->string('total_transport');
            $table->string('amount');
            $table->string('note');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payrolls');
    }
};
