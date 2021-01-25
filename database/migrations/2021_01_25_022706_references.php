<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class References extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('record_requests', function (Blueprint $table) {
            $table->foreign('session_id')->references('id')->on('session_records')->onDelete('cascade');
            $table->foreign('bloc_action_id')->references('id')->on('record_bloc_actions')->onDelete('cascade');
        });

        Schema::table('record_bloc_actions', function (Blueprint $table) {
            $table->foreign('bloc_id')->references('id')->on('record_blocs')->onDelete('cascade');
        });
        Schema::table('session_records', function (Blueprint $table) {
            $table->foreign('device_id')->references('id')->on('device_records')->onUpdate('cascade');
        });
        Schema::table('user_favorite_devices', function (Blueprint $table) {
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('device_id')->references('id')->on('device_records')->onUpdate('cascade');
        });
        Schema::table('record_bloc_events', function (Blueprint $table) {
            $table->foreign('bloc_id')->references('id')->on('record_blocs')->onUpdate('cascade');
            $table->foreign('bloc_action_id')->references('id')->on('record_bloc_actions')->onUpdate('cascade');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->foreign('last_request_id')->references('id')->on('record_requests')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('record_requests', function (Blueprint $table) {
            $table->dropForeign('session_id');
            $table->dropForeign('bloc_action_id');
        });

        Schema::table('record_bloc_actions', function (Blueprint $table) {
            $table->dropForeign('bloc_id');
        });
        Schema::table('session_records', function (Blueprint $table) {
            $table->dropForeign('device_id');
        });
        Schema::table('user_favorite_devices', function (Blueprint $table) {
            $table->dropForeign('user_id');
            $table->dropForeign('device_id');
        });
        Schema::table('record_bloc_events', function (Blueprint $table) {
            $table->dropForeign('bloc_id');
            $table->dropForeign('bloc_action_id');
        });
        Schema::table('users', function (Blueprint $table) {
            $table->dropForeign('last_request_id');
        });
    }
}
