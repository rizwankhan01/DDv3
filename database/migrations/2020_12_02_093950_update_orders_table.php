<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table){
          $table->string('serviceman_id')->nullable();
          $table->string('dealer_id')->nullable();
          $table->string('stock_price')->nullable();
          $table->string('reschedule_reason')->nullable();
          $table->string('cancel_reason')->nullable();
          $table->string('pickup_reason')->nullable();
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
