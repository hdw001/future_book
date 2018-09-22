<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable1 extends Migration
{
    private $table = 'users';

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

        Schema::table($this->table, function (Blueprint $table) {
            $table->integer('sex')->nullable()->default(NULL)->comment('性别');
            $table->integer('age')->nullable()->default(NULL)->comment('年龄');
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
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('sex');
            $table->dropColumn('age');
        });

    }
}
