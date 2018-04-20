<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDimStore extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_store', function (Blueprint $table) {
            $table->string('store_code', 32)->comment('门店id');
            $table->string('name', 32)->comment('门店简称');
            $table->string('address', 64)->nullable()->comment('门店地址');
            $table->date('ts_created')->comment('创建时间');
            $table->string('province', 12)->nullable()->comment('省');
            $table->string('city', 12)->nullable()->comment('市');

            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_store');
    }
}
