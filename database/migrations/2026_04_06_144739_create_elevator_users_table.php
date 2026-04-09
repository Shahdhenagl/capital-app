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
        Schema::create('elevator_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();

            $table->string('elevator_type')->nullable();
            $table->string('location')->nullable();
            $table->string('official_number')->nullable();
            $table->string('address')->nullable();

            // 👇 الإضافات الجديدة
            $table->boolean('is_subscribed')->default(false);

            $table->enum('payment_plan', [
                'quarterly',
                'semi_annual',
                'three_quarter',
                'annual'
            ])->nullable();
            $table->enum('city', ['مكة', 'جدة'])->nullable();

            $table->boolean('is_active')->default(true);

            $table->timestamps();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('elevator_users');
    }
};
