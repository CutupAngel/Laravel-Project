<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAlarmsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('alarms', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('user_id');
            $table->string('job_no');
            $table->string('date');
            $table->string('alarm_monitor_company');
            $table->integer('client_id');
            $table->string('client_address');
            $table->string('sector_activation');
            $table->string('time_on_site');
            $table->string('time_off_site');
            $table->string('document_no');
            $table->string('invoice_to');
            $table->string('comment');
            $table->string('security_officer_name');
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
        Schema::dropIfExists('alarms');
    }
}
