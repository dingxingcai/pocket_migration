<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableDimVip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dim_vip', function (Blueprint $table) {
            $table->string('VipCardID',32)->comment('会员编号');
            $table->string('VipCardCode',32)->comment('会员编码(手机号)');
            $table->smallInteger('Type')->comment('会员类型');
            $table->date('CreateDate')->comment('会员创建时间');
            $table->float('totalMoney',8,2)->default(0)->comment('总消费金额');
            $table->integer('totalCent')->default(0)->comment('总积分');

            $table->primary('VipCardID');
            $table->engine = 'InnoDB';
            $table->collation = 'utf8mb4_unicode_ci';

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dim_vip');
    }
}
