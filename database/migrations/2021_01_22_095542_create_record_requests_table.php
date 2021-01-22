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
            $table->integer('session_id')->unsigned(); // SessionRecord.id
            $table->enum('status', array('pending', 'error', 'done'))->default('pending');
            $table->integer('status_code');
            $table->integer('bloc_action_id')->nullable(); // RecordBlocAction.id
            $table->enum('method', array('POST', 'GET', 'DELETE', 'PUT'))->default('POST');
            $table->integer('duration');
            $table->string('params'); // json
            $table->string('payload'); // json
            $table->date('created_at');
            $table->date('response_at');
            $table->string('url');
            $table->string('headers_response'); // json
            $table->string('headers'); // json
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
