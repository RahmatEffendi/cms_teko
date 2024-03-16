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
        Schema::table('users', function (Blueprint $table) {
            $table->dateTime('approval_at')->after('updated_at')->nullable();
            $table->integer('approval_by')->after('approval_at')->nullable();
            $table->dateTime('rejected_at')->after('approval_by')->nullable();
            $table->integer('rejected_by')->after('rejected_at')->nullable();
            $table->integer('status_id')->after('rejected_by')->nullable();
            $table->string('status')->after('status_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
};
