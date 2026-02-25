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
        Schema::create('invoices', function (Blueprint $table) {
            $table->id();
            $table->string('invoice_no')->unique();

// ✅ MUST MATCH students.rollno
            $table->unsignedInteger('rollno');
            $table->integer('month');
            $table->decimal('total_amount', 10, 2);
            $table->decimal('paid_amount', 10, 2);
            $table->decimal('due_amount', 10, 2);

            $table->enum('status', ['paid','due'])->default('due');

            $table->timestamps();

            $table->foreign('rollno')
                ->references('rollno')
                ->on('students')
                ->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('invoices');
    }
};
