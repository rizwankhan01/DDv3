<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddChangesToTemperedGlassOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tempered_glass_orders', function (Blueprint $table) {
            $table->dropColumn('model_id');
            $table->string('model');
            $table->string('referer');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tempered_glass_orders', function (Blueprint $table) {
            //
        });
    }
}
