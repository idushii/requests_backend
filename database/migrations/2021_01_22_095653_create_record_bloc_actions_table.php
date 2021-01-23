<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRecordBlocActionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('record_bloc_actions', function (Blueprint $table) {
            $table->id();
            $table->integer('bloc_id')->unsigned();
            $table->string('name');
            $table->string('payload'); // json
            $table->foreign('bloc_id')->references('id')->on('record_blocs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('record_bloc_actions');
    }
}
