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
        Schema::create('tenant_users', function (Blueprint $table) {
            $table->id();
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('phone', 30)->unique()->nullable();
            $table->boolean('is_admin')->default(false);
            $table->date('dob')->nullable()->comment('Date of Birth');
            $table->enum('gender', ['male', 'female', 'other'])->default('other');
            $table->string('position', 100)->nullable()->comment('Job Position');
            $table->unsignedMediumInteger('salary')->nullable()->comment('Monthly Salary');
            $table->string('password');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenant_users');
    }
};
