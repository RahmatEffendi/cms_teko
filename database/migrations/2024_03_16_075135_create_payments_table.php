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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->integer('job_id');
            $table->integer('type');
            $table->string('card_number')->nullable();
            $table->integer('months')->nullable();
            $table->integer('years')->nullable();
            $table->integer('cvv')->nullable();
            $table->text('file_transfer')->nullable(); 
            $table->string('status')->nullable(); 
            $table->integer('status_id')->nullable(); 
            $table->dateTime('approval_at')->nullable(); 
            $table->integer('approval_by')->nullable(); 
            $table->dateTime('rejected_at')->nullable(); 
            $table->integer('rejected_by')->nullable(); 
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
