<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTemperedGlassOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tempered_glass_orders', function (Blueprint $table) {
            $table->id();
            $table->integer('model_id');
            $table->string('name');
            $table->string('phone_number');
            $table->string('address');
            $table->string('city');
            $table->integer('status')->default(0);
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
        Schema::dropIfExists('tempered_glass_orders');
    }
}
