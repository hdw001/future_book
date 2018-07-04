<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDataBook extends Migration
{
    private $table='data_book';
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create($this->table, function (Blueprint $table) {
            $table->increments('id');
            $table->integer('book_cate_id')->default(NULL)->comment('图书分类');
            $table->string('book_name')->default(NULL)->comment('图书名称');
            $table->string('book_author')->default(NULL)->comment('图书作者');
            $table->string('book_press')->default(NULL)->comment('图书出版社');
            $table->text('book_introduction')->default(NULL)->comment('图书简介');
            $table->string('book_number')->default(NULL)->comment('图书数量');
            $table->text('book_detail')->default(NULL)->comment('图书详情');
            $table->string('book_url')->default(NULL)->comment('图书图片');
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
        Schema::dropIfExists($this->table);
    }
}
