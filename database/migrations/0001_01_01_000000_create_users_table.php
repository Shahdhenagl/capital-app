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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->string('phone')->nullable();
            $table->string('secondary_phone')->nullable();
            $table->boolean('is_previous_client')->default(false);
            $table->string('location')->nullable();
            $table->enum('city', ['مكة', 'جدة']);
            $table->enum('type', [
                'technician',
                'manager',
                'client',
                'customer_service'
            ])->default('client');
//            $table->foreignId('city_id')->constrained()->nullable();
            $table->string('address')->nullable();
            $table->integer('elevators_count')->default(0);
            $table->string('elevator_type')->nullable();
            $table->string('commercial_register')->nullable();
            $table->string('tax_card')->nullable();
            $table->softDeletes(); 
            $table->date('start_date')->nullable()->comment('تاريخ البداية');
            $table->date('end_date')->nullable()->comment('تاريخ النهاية');
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary();
            $table->foreignId('user_id')->nullable()->index();
            $table->string('ip_address', 45)->nullable();
            $table->text('user_agent')->nullable();
            $table->longText('payload');
            $table->integer('last_activity')->index();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
