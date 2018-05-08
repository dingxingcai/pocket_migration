<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentrefund extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `paymentrefund` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `paymentId` int(11) NOT NULL,
  `refundNo` varchar(255) NOT NULL,
  `refundFee` int(11) NOT NULL,
  `state` enum('PENDING','SUCCESS','FAIL') NOT NULL DEFAULT 'PENDING',
  `remark` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `deletedAt` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `payment_refund_refund_no` (`refundNo`)) 
  ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='退款单'
SQL;

        \DB::connection('dc')->unprepared($sql);

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('paymentrefund');
    }
}
