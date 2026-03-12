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
        Schema::create('materials', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('teacher_id');
            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('section_id');

            $table->string('title');
            $table->string('file');

            $table->text('description')->nullable();

            $table->timestamps();

            $table->foreign('teacher_id')->references('id')->on('teachers')->cascadeOnDelete();
            $table->foreign('group_id')->references('id')->on('groups')->cascadeOnDelete();
            $table->foreign('section_id')->references('id')->on('sections')->cascadeOnDelete();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('materials');
    }
};
