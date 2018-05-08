<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateOrderactionhistory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE `orderactionhistory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `orderId` int(11) NOT NULL,
  `fromState` enum('WAITING','TAKING','RETURNING','SETTLING','FINISHED','CLOSED') NOT NULL,
  `toState` enum('WAITING','TAKING','RETURNING','SETTLING','FINISHED','CLOSED') NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `createdAt` datetime NOT NULL,
  `updatedAt` datetime NOT NULL,
  PRIMARY KEY (`id`),
  KEY `order_action_history_created_at` (`createdAt`)
) 
ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=utf8 COMMENT='订单操作历史记录表'
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
        Schema::dropIfExists('orderactionhistory');
    }
}
