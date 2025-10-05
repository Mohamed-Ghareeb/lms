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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();
            $table->json('name');
            $table->string('slug', 63)->unique()->comment('Used for subdomain');
            $table->string('database', 64)->unique();
            $table->string('db_username', 32)->unique();
            $table->string('db_password', 191);
            $table->boolean('is_active')->default(true);
            $table->date('free_trial_end_date')->nullable()->comment('Trial period end date');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenants');
    }
};
