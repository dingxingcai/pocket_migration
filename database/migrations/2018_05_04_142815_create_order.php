<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `zulinOrder` (
  `id` int(11) NOT NULL ,
  `orderNo` varchar(63) NOT NULL,
  `customerId` int(11) DEFAULT NULL,
  `outStoreId` int(11) DEFAULT NULL,
  `outAt` datetime DEFAULT NULL,
  `actualOutAt` datetime DEFAULT NULL,
  `inStoreId` int(11) DEFAULT NULL,
  `inAt` datetime DEFAULT NULL,
  `actualInAt` datetime DEFAULT NULL,
  `goodsId` int(11) DEFAULT NULL,
  `rent` int(11) NOT NULL DEFAULT '0',
  `rentTotal` int(11) NOT NULL DEFAULT '0',
  `rentedDays` int(11) NOT NULL DEFAULT '0',
  `actualRentedDays` int(11) NOT NULL DEFAULT '0',
  `deposit` int(11) NOT NULL DEFAULT '0',
  `lateFee` int(11) NOT NULL DEFAULT '0',
  `compensation` int(11) NOT NULL DEFAULT '0',
  `otherFee` int(11) NOT NULL DEFAULT '0',
  `otherReason` varchar(2000) DEFAULT NULL,
  `remark` varchar(4000) DEFAULT NULL,
  `state` enum('WAITING','TAKING','RETURNING','SETTLING','FINISHED','CLOSED') NOT NULL,
  `paymentTotal` int(11) NOT NULL DEFAULT '0',
  `paymentFinishAt` datetime DEFAULT NULL,
  `paymentId` int(11) DEFAULT NULL,
  `settlementTotal` int(11) NOT NULL DEFAULT '0',
  `settlementFinishAt` datetime DEFAULT NULL,
  `paymentRefundId` int(11) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  `itemId` int(11) DEFAULT NULL,
  `archivedBy` int(11) DEFAULT NULL,
  `settlementType` enum('NORMAL','OVERTIME','DAMAGED','OTHER') DEFAULT NULL,
  `imageUrls` json DEFAULT NULL,
  `discountAmount` int(11) NOT NULL DEFAULT '0',
  `compensationReason` varchar(2000) DEFAULT NULL,
  `otherResult` varchar(2000) DEFAULT NULL,
  `lateDays` int(11) NOT NULL DEFAULT '0',
  `outStaffId` int(11) DEFAULT NULL,
  `inStaffId` int(11) DEFAULT NULL,
  `hasReturnedBackCoupon` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`))
  ENGINE=InnoDB AUTO_INCREMENT=53 DEFAULT CHARSET=utf8 COMMENT='订单表'
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
        Schema::dropIfExists('zulinOrder');
    }
}
