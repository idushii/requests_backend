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
            $table->unsignedBigInteger('bloc_id');
            $table->string('name');
            $table->string('payload'); // json
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
