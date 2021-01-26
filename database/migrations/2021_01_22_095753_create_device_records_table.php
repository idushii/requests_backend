<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDeviceRecordsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('device_records', function (Blueprint $table) {
            $table->id();
            $table->string('uuid')->unique();
            $table->date('datetime_last_active');
            $table->integer('active_session_id')->nullable();
            $table->string('device_name');
            $table->string('device_version');
            $table->string('identifier');
            $table->string('product');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('device_records');
    }
}
