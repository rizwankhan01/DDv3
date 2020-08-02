<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pricings', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('color_id')->nullable();
            $table->string('ord_selling_price')->nullable();
            $table->string('org_selling_price')->nullable();
            $table->string('preferred_type')->nullable();
            $table->string('ord_stock_availablity')->nullable();
            $table->string('org_stock_availablity')->nullable();
            $table->string('ord_compare_description')->nullable();
            $table->string('org_compare_description')->nullable();
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
        Schema::dropIfExists('pricings');
    }
}
