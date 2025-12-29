<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('cats', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('bio');
            $table->enum('gender', ['Male', 'Female']);
            $table->integer('age');
            $table->string('breed');
            $table->string('location');
            $table->enum('status', ['Available', 'Adopted'])->default('Available');
            $table->string('photo');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cats');
    }
};
