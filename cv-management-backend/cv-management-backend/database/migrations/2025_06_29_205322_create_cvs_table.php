<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('cvs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('member_id')->constrained('members')->onDelete('cascade');

            $table->string('firstName');
            $table->string('lastName');
            $table->string('email')->nullable();
            $table->string('phoneNumber');
            $table->string('cityLiving');
            $table->string('countryLiving');
            $table->text('summary')->nullable();

            $table->json('educations')->nullable();
            $table->json('experiences')->nullable();
            $table->json('skills')->nullable();

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('cvs');
    }
};
