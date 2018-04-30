<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactYouzanTradeCouponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `fact_youzan_trade_coupons` (
  `coupon_id` int(11) NOT NULL COMMENT '该组卡券的ID',
  `tid` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL COMMENT '交易编号',
  `coupon_name` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '该组卡券的名称',
  `coupon_type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卡券的类型。可选值：PROMOCARD（优惠券）、PROMOCODE（优惠码）',
  `coupon_content` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卡券内容。当卡券类型为优惠码时，值为优惠码字符串',
  `coupon_description` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卡券的说明',
  `coupon_condition` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卡券使用条件说明',
  `used_at` timestamp NULL DEFAULT NULL COMMENT '使用时间',
  `discount_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '优惠的金额，单位：元，精确到小数点后两位',
  PRIMARY KEY (`tid`, `coupon_id`),
  KEY idx_coupon_id(coupon_id)
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
        Schema::dropIfExists('fact_youzan_trade_coupons');
    }
}
