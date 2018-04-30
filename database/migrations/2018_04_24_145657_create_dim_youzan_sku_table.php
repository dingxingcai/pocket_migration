<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimYouzanSkuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_youzan_sku', function (Blueprint $table) {
            $table->integer('item_id')->comment('商品ID');
            $table->integer('sku_id')->comment('规格id');
            $table->string('sku_unique_code', 64)->nullable()->comment('唯一编码，店铺Id和商品Id组合');
            $table->integer('price')->comment('商品的这个Sku的价格，单位 分');
            $table->timestamp('created')->nullable()->comment('Sku创建日期，时间格式：yyyy-MM-dd HH:mm:ss');
            $table->timestamp('modified')->nullable()->comment('Sku最后修改日期，时间格式：yyyy-MM-dd HH:mm:ss');
            $table->string('item_no', 32)->nullable()->comment('商家编码（商家为Sku设置的外部编号）');
            $table->integer('sold_num')->nullable()->comment('属于这个Sku的销量');

            $table->string('properties_name_json', 1024)->nullable()->comment('Sku所对应的销售属性的Json字符串');

            $table->string('title', 32)->nullable()->comment('商品标题');
            $table->string('desc', 32)->nullable()->comment('商品内容');

            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';

            $table->primary(['item_id', 'sku_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_youzan_sku');
    }
}
