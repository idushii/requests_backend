<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordBlocEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_bloc_events', function (Blueprint $table) {
            $table->id();
            $table->integer('bloc_id')->unsigned();
            $table->integer('bloc_action_id')->unsigned();
            $table->string('event_name');
            $table->string('payload');  // json
            $table->timestamps();
            $table->foreign('bloc_id')->references('id')->on('record_blocs')->onUpdate('cascade');
            $table->foreign('bloc_action_id')->references('id')->on('record_bloc_actions')->onUpdate('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_bloc_events');
    }
}
