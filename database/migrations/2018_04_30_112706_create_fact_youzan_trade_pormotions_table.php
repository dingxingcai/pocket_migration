<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactYouzanTradePormotionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `fact_youzan_trade_pormotions` (
  `tid` varchar(32) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '交易编号',
  `promotion_id` int(11) NOT NULL COMMENT '该优惠活动的ID',
  `promotion_name` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '该优惠活动的名称',
  `promotion_type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '优惠的类型。可选值：<br> FULLREDUCE（满减满送）<br> ORDERCASHBACK（订单返现）<br> GROUPBUYING（商品团购）<br> GROUPON（多人拼团）<br> SECKILL（秒杀）<br> AUCTION（降价拍）',
  `promotion_condition` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '优惠使用条件说明',
  `used_at` timestamp NULL DEFAULT NULL COMMENT '使用时间',
  `discount_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '优惠的金额，单位：元，精确到小数点后两位',
  PRIMARY KEY (`tid`, `promotion_id`),
  KEY idx_promotion_id(promotion_id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
SQL;

        \DB::statement($sql);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('fact_youzan_trade_pormotions');
    }
}
