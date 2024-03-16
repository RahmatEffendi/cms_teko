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
        Schema::create('job_publishs', function (Blueprint $table) {
            $table->id();
            $table->integer('job_package_id');
            $table->string('name');
            $table->integer('age');
            $table->text('descriptions');
            $table->string('photo');
            $table->string('status');
            $table->integer('status_id');
            $table->text('notes');
            $table->dateTime('rejected_at')->nullable();
            $table->dateTime('approval_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('job_publishs');
    }
};
