<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelResourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_resources', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('model_id')->nullable();
            $table->string('screen_type')->nullable();
            $table->string('screen_size')->nullable();
            $table->string('screen_resolution')->nullable();
            $table->string('screen_protection')->nullable();
            $table->string('fix_type')->nullable();
            $table->string('screen_fixtype')->nullable();
            $table->string('release_date')->nullable();
            $table->string('production_status')->nullable();
            $table->string('tut_link')->nullable();
            $table->string('buy_link')->nullable();
            $table->string('phone_price')->nullable();
            $table->string('display_type')->nullable();
            $table->string('display_size')->nullable();
            $table->string('display_resolution')->nullable();
            $table->string('display_protection')->nullable();
            $table->string('colors')->nullable();
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
        Schema::dropIfExists('model_resources');
    }
}
