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
        Schema::create('student_payments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('student_id');
            $table->integer('month'); // January = 1
            $table->decimal('total_amount',10,2);
            $table->decimal('paid_amount',10,2);
            $table->decimal('due_amount',10,2);
            $table->enum('status',['paid','due']);
            $table->timestamps();

            $table->foreign('student_id')->references('id')->on('students')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('student_payments');
    }
};
