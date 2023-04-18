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
        Schema::create('log_events', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('user_email');
            $table->string('logtype');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
        Schema::create('log_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_event_id');
            $table->string('eddited_id');
            $table->string('old_status');
            $table->string('new_status');
            $table->string('old_prio');
            $table->string('new_prio');
            $table->string('is_deleted');

            $table->timestamps();

            $table->foreign('log_event_id')->references('id')->on('log_events')->onDelete('cascade');
        });

        Schema::create('log_deleted_requests', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('log_event_id');
            $table->string('request_id');
            $table->unsignedBigInteger('user_id');
            $table->string('status');
            $table->string('prio');
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
        Schema::dropIfExists('log_event');
        Schema::dropIfExists('log_request');
        Schema::dropIfExists('log_request_deleted');
    }
};
