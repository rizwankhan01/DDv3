<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateModelAnalyticsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('model_analytics', function (Blueprint $table) {
            $table->id();
            $table->string('url')->nullable();
            $table->string('clicks')->nullable();
            $table->string('impressions')->nullable();
            $table->string('ctr')->nullable();
            $table->string('position')->nullable();
            $table->string('month')->nullable();
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
        Schema::dropIfExists('model_analytics');
    }
}
