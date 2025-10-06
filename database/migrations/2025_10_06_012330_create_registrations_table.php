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
        Schema::create('registrations', function (Blueprint $table) {
            $table->id();

            // All fields nullable
            $table->string("fullName")->nullable();
            $table->string("fatherName")->nullable();
            $table->integer("age")->nullable();
            $table->date("dob")->nullable();
            $table->string("address", 500)->nullable();
            $table->string("phone", 15)->nullable();
            $table->string("email")->nullable();
            $table->string("school")->nullable();
            $table->string("academy")->nullable();
            $table->string("teacher")->nullable();
            $table->string("event")->nullable();
            $table->string("category")->nullable();

            // File Upload
            $table->string("payment_screenshot")->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('registrations');
    }
};
