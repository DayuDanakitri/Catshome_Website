<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('adoption_applications', function (Blueprint $table) {
            $table->id();
            $table->foreignId('cat_id')->constrained()->onDelete('cascade');
            $table->string('applicant_name');
            $table->string('license_id');
            $table->text('address');
            $table->string('partner_name')->nullable();
            $table->string('phone');
            $table->enum('housing', ['Rent', 'Parents', 'Own']);
            $table->string('email');
            $table->integer('age');
            $table->enum('employment', ['Full-time','Part-time','Unemployed','Student','Retired']);
            $table->enum('status', ['Pending','Accepted','Rejected'])->default('Pending');
            $table->timestamps();
        });
    }


    public function down(): void
    {
        Schema::dropIfExists('adoption_applications');
    }
};
