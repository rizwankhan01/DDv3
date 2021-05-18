<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateCustomersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::table('customers', function (Blueprint $table) {
          $table->string('title')->nullable();
          $table->date('date_of_birth')->nullable();
          $table->string('language')->nullable();
          $table->string('profession')->nullable();
          $table->string('display_picture')->nullable();
          $table->string('social_profile')->nullable();
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
