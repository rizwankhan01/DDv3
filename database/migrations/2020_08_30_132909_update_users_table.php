<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table){
          $table->string('gender')->nullable();
          $table->string('primary_phone')->nullable();
          $table->string('secondary_phone')->nullable();
          $table->string('address')->nullable();
          $table->string('city')->nullable();
          $table->string('fathers_name')->nullable();
          $table->string('date_of_birth')->nullable();
          $table->string('date_of_join')->nullable();
          $table->string('profile_image')->nullable();
          $table->string('user_type')->nullable();
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
