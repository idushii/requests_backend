<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_requests', function (Blueprint $table) {
            $table->id();
            $table->integer('number');
            $table->unsignedBigInteger('session_id');
            $table->string('status');
            $table->integer('status_code')->nullable();
            $table->unsignedBigInteger('bloc_action_id')->nullable();
            $table->string('method')->nullable();
            $table->integer('duration')->nullable();
            $table->json('params')->nullable();
            $table->json('payload')->nullable();
            $table->date('created_at');
            $table->date('response_at')->nullable();
            $table->string('url');
            $table->json('headers_response')->nullable();
            $table->json('headers')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_requests');
    }
}
