<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPersonalInfoToUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->string('fname');
            $table->string('lname');
            $table->string('nickname')->nullable();
            $table->string('hobby1')->nullable();
            $table->string('hooby2')->nullable();
            $table->integer('phone')->nullable();
            $table->integer('mobile');
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
            $table->dropColumn('fname');
            $table->dropColumn('lname');
            $table->dropColumn('nickname');
            $table->dropColumn('hobby1');
            $table->dropColumn('hooby2');
            $table->dropColumn('phone');
            $table->dropColumn('mobile');
        });
    }
}
