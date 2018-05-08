<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRetailbill extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $sql = <<<SQL
CREATE TABLE retailBill (
  BillNumberId numeric(10)  NOT NULL,
  PtypeId varchar(50) NOT NULL,
  Qty numeric(24,10)  NULL,
  SalePrice numeric(24,10)  NULL,
  discount numeric(24,10)  NULL,
  DiscountPrice numeric(24,10)  NULL,
  costprice numeric(24,10)  NULL,
  total numeric(24,10)  NULL,
  TaxPrice numeric(24,10)  NULL,
  TaxTotal numeric(24,10)  NULL,
  comment varchar(255)  NULL,
  KTypeID varchar(50)   NOT NULL,
  ETypeID varchar(50)   NULL,
  ID numeric(10) NOT NULL,
  PRIMARY KEY (BillNumberId,PtypeId,ID))
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
        Schema::dropIfExists('retailbill');

    }
}
