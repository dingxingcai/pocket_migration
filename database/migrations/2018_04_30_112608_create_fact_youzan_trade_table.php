<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactYouzanTradeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
//        Schema::create('fact_youzan_trade', function (Blueprint $table) {
//            $table->increments('id');
//            $table->timestamps();
//        });

        $sql = <<<SQL
CREATE TABLE `fact_youzan_trade` (
  `tid` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易编号',
  `num` int(11) DEFAULT NULL COMMENT '商品购买数量。当一个trade对应多个order的时候，值为所有商品购买数量之和',
  `item_id` int(11) DEFAULT NULL COMMENT '商品数字编号。当一个trade对应多个order的时候，值为第一个交易明细中的商品的编号',
  `price` DECIMAL(10,2) DEFAULT NULL COMMENT '商品价格。精确到2位小数；单位：元。当一个trade对应多个order的时候，值为第一个交易明细中的商品的价格',
  `title` varchar(128) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易标题，以首个商品标题作为此标题的值',
  `type` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易类型。取值范围：<br> FIXED （一口价）<br> GIFT （送礼）<br> BULK_PURCHASE（来自分销商的采购）<br> PRESENT （赠品领取）<br> GROUP （拼团订单）<br> PIFA （批发订单）<br> COD （货到付款）<br> PEER （代付）<br> QRCODE（扫码商家二维码直接支付的交易）<br> QRCODE_3RD（线下收银台二维码交易)',
  `feedback` int(11) DEFAULT NULL COMMENT '交易维权状态。<br> 0 无维权，1 顾客发起维权，2 顾客拒绝商家的处理结果，3 顾客接受商家的处理结果，9 商家正在处理,101 维权处理中,110 维权结束。<br> 备注：1到10的状态码是微信维权状态码，100以上的状态码是有赞维权状态码',
  `refund_state` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '退款状态。取值范围：<br> NO_REFUND（无退款）<br> PARTIAL_REFUNDING（部分退款中）<br> PARTIAL_REFUNDED（已部分退款）<br> PARTIAL_REFUND_FAILED（部分退款失败）<br> FULL_REFUNDING（全额退款中）<br> FULL_REFUNDED（已全额退款）<br> FULL_REFUND_FAILED（全额退款失败）<br>',
  `outer_tid` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '外部交易编号。比如，如果支付方式是微信支付，就是财付通的交易单号',
  `transaction_tid` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付流水号',
  `status` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易状态。取值范围：<br> TRADE_NO_CREATE_PAY (没有创建支付交易) <br> WAIT_BUYER_PAY (等待买家付款) <br> WAIT_PAY_RETURN (等待支付确认) <br> WAIT_GROUP（等待成团，即：买家已付款，等待成团）<br> WAIT_SELLER_SEND_GOODS (等待卖家发货，即：买家已付款) <br> WAIT_BUYER_CONFIRM_GOODS (等待买家确认收货，即：卖家已发货) <br> TRADE_BUYER_SIGNED (买家已签收) <br> TRADE_CLOSED (付款以后用户退款成功，交易自动关',
  `post_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '运费。单位：元，精确到分',
  `total_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '商品总价（商品价格乘以数量的总金额）。单位：元，精确到分',
  `refunded_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '交易完成后退款的金额。单位：元，精确到分',
  `discount_fee` DECIMAL(10,2) DEFAULT NULL COMMENT '交易优惠金额（不包含交易明细中的优惠金额）。单位：元，精确到分',
  `payment` DECIMAL(10,2) DEFAULT NULL COMMENT '实付金额。单位：元，精确到分',
  `created` timestamp NULL DEFAULT NULL COMMENT '交易创建时间',
  `update_time` timestamp NULL DEFAULT NULL COMMENT '交易更新时间。当交易的：状态改变、备注更改、星标更改 等情况下都会刷新更新时间',
  `pay_time` timestamp NULL DEFAULT NULL COMMENT '买家付款时间',
  `pay_type` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '支付类型。取值范围： WEIXIN (微信自有支付) WEIXIN_DAIXIAO (微信代销支付) ALIPAY (支付宝支付) BANKCARDPAY (银行卡支付) PEERPAY (代付) CODPAY (货到付款) BAIDUPAY (百度钱包支付) PRESENTTAKE (直接领取赠品) COUPONPAY(优惠券/码全额抵扣) BULKPURCHASE(来自分销商的采购) MERGEDPAY(合并付货款) ECARD(有赞E卡支付) PURCHASE_PAY (采购单支付)',
  `consign_time` timestamp NULL DEFAULT NULL COMMENT '卖家发货时间',
  `sign_time` timestamp NULL DEFAULT NULL COMMENT '买家签收时间',
  `adjust_fee` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'change:总改价金额<br> pay_change:订单改价<br> post_change:邮费改价<br> 数据为0.00代表没有对应的改价。<br> 卖家手工调整订单金额。精确到2位小数；单位：元。若卖家减少订单金额10元2分，则这里为10.02；若卖家增加订单金额10元2分，则这里为-10.02',
  `relation_type` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '分销/采购单:source:采购单;fenxiao:分销单 空串则为非分销/采购单',
  `relations` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT 'elation_type返回source时,为分销订单号列表<br> 返回fenxiao时,为供应商订单号列表<br> 返回空时,列表返回空',
  `out_trade_no` varchar(512) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '代付订单外部交易号列表,非代付订单类型返回空',
  `profit` DECIMAL(10,2) DEFAULT NULL COMMENT '利润（分销订单特有）。格式：5.20；单位：元；精确到：分',
  `handled` int(11) DEFAULT NULL COMMENT '结算状态（分销订单特有）。1：已结算，0：未结算',
  `outer_user_id` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '三方APP用户id',
  `status_str` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '订单状态描述: 待付款,待发货,待成团,待接单,已接单,已发货,已完成,已关闭',
  `box_price` DECIMAL(10,2) DEFAULT NULL COMMENT '餐盒费',
  PRIMARY KEY (`tid`)
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
        Schema::dropIfExists('fact_youzan_trade');
    }
}
