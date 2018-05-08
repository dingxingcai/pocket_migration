<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateZulinOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('zulin_order', function (Blueprint $table) {
            $table->string('orderNo', 32)->primaryKey()->comment('租赁订单id');
            $table->string('ts_created', 32)->comment('订单时间');
            $table->string('goodsId', 32)->comment('商品id');
            $table->string('itemId', 32)->nullable()->comment('设备ID');
            $table->string('customerId', 32)->comment('用户id');
            $table->string('storeId', 32)->comment('门店id');
            $table->string('actualOutAt', 32)->nullable()->comment('实际取货时间');
            $table->string('outAt', 32)->comment('预计取货时间');
            $table->string('actualInAt', 32)->nullable()->comment('实际还货时间');
            $table->string('InAt', 32)->comment('预计还货时间');
            $table->string('outStaff', 32)->nullable()->comment('取货店员id');
            $table->string('inStaff', 32)->nullable()->comment('还货店员id');
            $table->string('cancleTime', 32)->nullable()->comment('订单取消时间');
            $table->float('rentTotal', 8, 2)->comment('租金');
            $table->float('deposit', 8, 2)->comment('押金');
            $table->float('originalPrice', 8, 2)->nullable()->comment('商品原价');
            $table->float('discountPrice', 8, 2)->nullable()->comment('商品折扣');
            $table->string('couponId', 32)->nullable()->comment('优惠券ID');
            $table->integer('lateDays')->default(0)->comment('超期天数');
            $table->integer('useLength')->default(0)->nullable()->comment('预计使用时长');
            $table->integer('actualUseLength')->default(0)->nullable()->comment('实际使用时长');
            $table->string('refundTime', 32)->nullable()->comment('押金退回时间');
            $table->float('refundMoney', 8, 2)->default(0)->comment('退押金金额');
            $table->string('finishedAt', 32)->nullable()->comment('订单完成时间');
            $table->string('damage', 32)->nullable()->comment('定损程度');
            $table->string('settleAt', 32)->nullable()->comment('订单手工结算时间');

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
        Schema::dropIfExists('zulin_order');
    }
}
