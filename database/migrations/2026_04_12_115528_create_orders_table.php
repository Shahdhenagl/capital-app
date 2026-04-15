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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->nullable()->constrained()->onDelete('set null');
           $table->foreignId('manager_id')->nullable()->constrained('users')->nullOnDelete();
           $table->foreignId('technician_id')->nullable()->constrained('users')->nullOnDelete();
            $table->foreignId('category_id')->nullable()->constrained()->onDelete('set null');
            $table->foreignId('elevator_user_id')->nullable()->constrained('elevator_users')->onDelete('set null');
            $table->text('reason_not_complete')->nullable();
            $table->text('reason_rejected')->nullable();
            $table->text('desc')->nullable();
       $table->enum('status', [
    'pending',
    'assigned',
    'accepted',
    'arrived',
    'in_progress',
    'complete',
    'not_complete',
    'rejected'
])->default('pending');

$table->text('image_before')->nullable();
$table->text('image_after')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
