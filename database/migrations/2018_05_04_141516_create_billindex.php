<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillindex extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE BillIndex (
  BillNumberId numeric(10)  NOT NULL,
  BillDate datetime  NOT NULL,
  BillCode varchar(200)   NOT NULL,
  BillType numeric(4)  NOT NULL,
  Comment varchar(256)   NULL,
  atypeid varchar(50)   NULL,
  btypeid varchar(50)   NULL,
  etypeid varchar(50)   NULL,
  ktypeid varchar(50)   NULL,
  ifcheck char(1)   NULL,
  checke varchar(50)   NULL,
  totalmoney numeric(24,10)  NULL,
  totalinmoney numeric(24,10)  NULL,
  totalqty numeric(24,10)  NULL,
  RedWord int  NOT NULL,
  draft int  NOT NULL,
  IfStopMoney char(1)   NULL,
  preferencemoney numeric(24,10)  NULL,
  DTypeId varchar(50)   NULL,
  JF int  NULL,
  VipCardID int  NULL,
  vipCZMoney numeric(24,10)  NULL,
  jsStyle char(1)  NULL,
  Poster varchar(50)   NULL,
  LastUpdateTime datetime  NULL,
  Stypeid varchar(50)   NULL,
  checkTime datetime  NULL,
  posttime datetime  NULL,
  BillTime varchar(20)   NULL,
  DealBTypeID varchar(50)   NULL,
  NTotalMoney numeric(24,10)  NULL,
  NTotalInMoney numeric(24,10)  NULL,
  NPreferenceMoney numeric(24,10)  NULL,
  NVIPCZMoney numeric(24,10)  NULL,
  PRIMARY KEY (BillNumberId))
ENGINE=innodb DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;
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
        Schema::dropIfExists('billindex');
    }
}
