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
        Schema::create('fees', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('group_id'); // class
            $table->unsignedBigInteger('fee_head_id');
            $table->tinyInteger('month'); // 1-12
            $table->decimal('amount', 10, 2);
            $table->timestamps();
            $table->foreign('group_id')->references('id')->on('groups')->onDelete('cascade');
            $table->foreign('fee_head_id')->references('id')->on('fee_heads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fees');
    }
};
