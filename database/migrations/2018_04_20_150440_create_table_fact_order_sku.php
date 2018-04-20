<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFactOrderSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_order_sku', function (Blueprint $table) {
            $table->string('oid', 32)->comment('订单表id');
            $table->string('sku_code', 32)->comment('商品编码');
            $table->integer('quantity')->comment('订单商品数量');
            $table->float('price_original', 8, 2)->nullable()->comment('原价');
            $table->float('price_actual', 8, 2)->nullable()->comment('实际价格');
            $table->float('price_payed', 8, 2)->nullable()->comment('实付价格');
            $table->string('bar_code', 32)->nullable()->comment('商品二维码');

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
        Schema::dropIfExists('fact_order_sku');
    }
}
