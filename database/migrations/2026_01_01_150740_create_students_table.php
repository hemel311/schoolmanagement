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
        Schema::create('students', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->date('dob');
            $table->text('present_address');
            $table->text('permanent_address');
            $table->text('image');
            $table->string('email')->unique();
            $table->string('password');
            $table->unsignedInteger('rollno')->unique();

            $table->unsignedBigInteger('group_id');
            $table->unsignedBigInteger('section_id');
            $table->unsignedBigInteger('parent_id');

            $table->timestamps();

            // ❌ NO cascade (group & section should stay)
            $table->foreign('group_id')->references('id')->on('groups');
            $table->foreign('section_id')->references('id')->on('sections');

            // ✅ ONLY parent will be deleted
            $table->foreign('parent_id')
                ->references('id')
                ->on('parents')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};
