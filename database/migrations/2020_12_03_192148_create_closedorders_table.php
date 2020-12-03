<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClosedordersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('closedorders', function (Blueprint $table) {
            $table->id();
            $table->string('order_id')->nullable();
            $table->string('pre_image')->nullable();
            $table->string('post_image')->nullable();
            $table->string('imei')->nullable();
            $table->string('payment_type')->nullable();
            $table->string('notes')->nullable();
            $table->string('start_timestamp')->nullable();
            $table->string('end_timestamp')->nullable();
            $table->string('start_lat')->nullable();
            $table->string('start_lng')->nullable();
            $table->string('end_lat')->nullable();
            $table->string('end_lng')->nullable();
            $table->string('distance')->nullable();
            $table->string('rate1')->nullable();
            $table->string('rate2')->nullable();
            $table->string('rate3')->nullable();
            $table->string('rate4')->nullable();
            $table->string('rate5')->nullable();
            $table->string('rate6')->nullable();
            $table->string('rate7')->nullable();
            $table->string('rate8')->nullable();
            $table->string('rate9')->nullable();
            $table->string('feedback')->nullable();
            $table->string('company_name')->nullable();
            $table->string('company_gst')->nullable();
            $table->string('company_address')->nullable();
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
        Schema::dropIfExists('closedorders');
    }
}
