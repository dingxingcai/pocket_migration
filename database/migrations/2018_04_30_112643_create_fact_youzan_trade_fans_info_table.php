<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactYouzanTradeFansInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `fact_youzan_trade_fans_info` (
  `tid` varchar(32) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '交易编号',
  `fans_nickname` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '粉丝昵称 订单信息中存在三方(例如微信)粉丝昵称则取粉丝昵称;取不到粉丝昵称时则使用买家手机号;以上两点未满足时取买家收货人信息;无收货人信息时返回[匿名]',
  `fans_id` BIGINT DEFAULT NULL COMMENT '粉丝id',
  `buyer_id` int(11) DEFAULT NULL COMMENT '有赞买家ID',
  `fans_type` int(11) DEFAULT NULL COMMENT '0:未知、1:微信自有粉丝',
  `fans_weixin_openid` varchar(64) COLLATE utf8mb4_unicode_ci DEFAULT NULL COMMENT '微信openid',
  PRIMARY KEY (`tid`),
  KEY idx_buyer_id(buyer_id),
  KEY idx_fans_weixin_openid(fans_weixin_openid)
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
        Schema::dropIfExists('fact_youzan_trade_fans_info');
    }
}
