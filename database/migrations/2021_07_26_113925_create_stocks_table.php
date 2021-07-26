<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stocks', function (Blueprint $table) {
            $table->id();
            $table->integer('model_id');
            $table->string('item_name');
            $table->integer('dealer_id');
            $table->string('cost');
            $table->string('color')->nullable();
            $table->string('quality')->nullable();
            $table->string('tested');
            $table->integer('posted_by');
            $table->string('store_name')->nullable();
            $table->string('payment_status');
            $table->string('payment_type');
            $table->integer('status')->nullable();
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
        Schema::dropIfExists('stocks');
    }
}
