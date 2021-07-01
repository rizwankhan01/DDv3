<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreColumnsToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('blood_group')->nullable();
            $table->text('mother_tongue')->nullable();
            $table->text('languages_known')->nullable();
            $table->text('nationality')->nullable();
            $table->text('religion')->nullable();
            $table->text('school')->nullable();
            $table->text('course')->nullable();
            $table->text('emergency_contact_name')->nullable();
            $table->text('emergency_contact_relation')->nullable();
            $table->text('emergency_contact_phone')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
        });
    }
}
