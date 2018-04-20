<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDimSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_sku', function (Blueprint $table) {
            $table->string('sku_code', 32)->comment('商品编码');
            $table->string('name', 32)->comment('商品名称');
            $table->string('category', 32)->nullable()->comment('商品类别');
            $table->string('brand', 32)->nullable()->comment('品牌');
            $table->string('spu_name', 32)->nullable()->comment('spn名称');
            $table->date('ts_created')->nullable()->comment('商品的创建时间');
            $table->string('brand_level', 32)->nullable()->comment('品牌等级');
            $table->string('supplier_settlement_mode', 12)->nullable()->comment('供应商结算方式');

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
        Schema::dropIfExists('dim_sku');
    }
}
