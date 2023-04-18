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
        Schema::create('log_deleted_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_event_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->string('is_active');
            $table->timestamps();

            $table->foreign('log_event_id')->references('id')->on('log_events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');

        });
        Schema::create('log_created_users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_event_id');
            $table->unsignedBigInteger('user_id');
            $table->string('name');
            $table->string('email');
            $table->timestamps();

            $table->foreign('log_event_id')->references('id')->on('log_events')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('log_user_tables');
    }
};
