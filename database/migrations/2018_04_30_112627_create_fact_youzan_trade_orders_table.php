<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactYouzanTradeOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('fact_youzan_trade_orders', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//        });

        $sql = <<<SQL
CREATE TABLE `fact_youzan_trade_orders` (
  `tid` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易编号',
  `oid` int(11) DEFAULT NULL COMMENT '交易明细编号。该编号并不唯一，只用于区分交易内的多条明细记录',
  `item_id` int(11) DEFAULT NULL COMMENT '商品数字编号',
  `sku_id` int(11) DEFAULT NULL COMMENT 'Sku的ID，sku_id 在系统里<span style="color: #ff0000;">并不是唯一的</span>，结合商品ID一起使用才是唯一的。',
  `sku_unique_code` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'Sku在系统中的唯一编号，可以在开发者的系统中用作 Sku 的唯一ID，但不能用于调用接口',
  `num` int(11) DEFAULT NULL COMMENT '商品购买数量',
  `outer_sku_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商家编码（商家为Sku设置的外部编号)',
  `outer_item_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品货号（商家为商品设置的外部编号）',
  `title` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品标题',
  `seller_nick` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '卖家昵称',
  `fenxiao_price` DECIMAL(10,2) NOT NULL COMMENT '商品在分销商那边的出售价格。精确到2位小数；单位：元。如果是采购单才有值，否则值为 0',
  `fenxiao_payment` DECIMAL(10,2) DEFAULT NULL COMMENT '商品在分销商那边的实付金额。精确到2位小数；单位：元。如果是采购单才有值，否则值为 0',
  `price` DECIMAL(10,2) DEFAULT NULL COMMENT '商品价格。精确到2位小数；单位：元',
  `total_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '应付金额（商品价格乘以数量的总金额）',
  `discount_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '交易明细内的优惠金额。精确到2位小数，单位：元',
  `payment` DECIMAL(10,2) DEFAULT NULL COMMENT '实付金额。精确到2位小数，单位：元',
  `sku_properties_name` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'SKU的值，即：商品的规格。如：机身颜色:黑色;手机套餐:官方标配',
  `pic_path` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品主图片地址',
  `pic_thumb_path` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品主图片缩略图地址',
  `item_type` int(11) DEFAULT NULL COMMENT '商品类型。<br>0：普通商品；<br>10：分销商品;',
  `buyer_messages` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易明细中的买家留言列表',
  `order_promotion_details` varchar(1024) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易明细中的优惠信息列表',
  `state_str` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品状态',
  `item_refund_state` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '商品退款状态',
  `is_virtual` int(11) DEFAULT NULL COMMENT '1 虚拟商品 0 非虚拟商品',
  `is_present` int(11) DEFAULT NULL COMMENT '1 赠品商品 0 普通商品',
  `refunded_fee` DECIMAL(10,2) NOT NULL COMMENT '退款金额',
  `allow_send` int(11) DEFAULT NULL COMMENT '是否允许发货 1 可以发货 0 不能发货',
  `is_send` int(11) DEFAULT NULL COMMENT '是否发货 1 已发货 0 未发货',
  PRIMARY KEY (`tid`, `oid`),
  KEY idx_item_id(item_id),
  KEY idx_sku_id(sku_id),
  KEY idx_title(title)
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
        Schema::dropIfExists('fact_youzan_trade_orders');
    }
}
