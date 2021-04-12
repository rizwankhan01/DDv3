<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateExotelCallsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('exotel_calls', function (Blueprint $table){
        $table->string('ParentCallSid')->nullable();
        $table->string('AccountSid')->nullable();
        $table->string('From')->nullable();
        $table->string('PhoneNumberSid')->nullable();
        $table->string('Status')->nullable();
        $table->string('StartTime')->nullable();
        $table->string('EndTime')->nullable();
        $table->string('Duration')->nullable();
        $table->string('Price')->nullable();
        $table->string('Direction')->nullable();
        $table->string('AnsweredBy')->nullable();
        $table->string('ForwardedFrom')->nullable();
        $table->string('CallerName')->nullable();
        $table->string('Uri')->nullable();
        $table->string('RecordingUrl')->nullable();
        $table->string('ExotelDateCreated')->nullable();
        $table->string('ExotelDateUpdated')->nullable();
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
