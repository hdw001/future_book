<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnUsersTable extends Migration
{
    private $table = 'users';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //创建表结构
        Schema::table($this->table, function (Blueprint $table) {
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');
        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->string('phone',100)->nullable()->default(NULL)->comment('手机号码');
            $table->string('work_number')->nullable()->default(NULL)->comment('工号');
            $table->integer('role_id')->nullable()->default(NULL)->comment('角色id');
            $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
            $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
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
        Schema::table($this->table,function(Blueprint $table){
            $table->dropColumn('phone');
            $table->dropColumn('work_number');
            $table->dropColumn('role_id');
            $table->dropColumn('created_at');
            $table->dropColumn('updated_at');


        });

        Schema::table($this->table, function (Blueprint $table) {
            $table->timestamp('created_at')->nullable()->default(NULL)->comment('创建时间');
            $table->timestamp('updated_at')->nullable()->default(NULL)->comment('更新时间');;
        });
    }
}
