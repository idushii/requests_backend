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
            $table->unsignedBigInteger('bloc_id');
            $table->unsignedBigInteger('bloc_action_id');
            $table->string('event_name');
            $table->string('payload');  // json
            $table->timestamps();
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
