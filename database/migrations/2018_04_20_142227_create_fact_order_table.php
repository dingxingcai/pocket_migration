<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFactOrderTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_order', function (Blueprint $table) {
            $table->string('oid', 32)->primarykey()->comment('订单id');
            $table->string('business_type', 12)->comment('业务订单类型');
            $table->string('business_id', 24)->unique()->comment('业务订单id');
            $table->string('ts_created', 24)->comment('订单创建时间');
            $table->string('business_status', 12)->nullable()->comment('业务状态');
            $table->smallInteger('is_settled')->default(0)->comment('状态是否固定不变了');
            $table->float('price_original', 8, 2)->nullable()->comment('原价');
            $table->float('price_actual', 8, 2)->nullable()->comment('实际价格');
            $table->float('price_payed', 8, 2)->nullable()->comment('实付金额');
            $table->string('vip_telephone', 11)->nullable()->comment('会员手机号');
            $table->string('store_code', 24)->nullable()->comment('门店编号');
            $table->string('sales_code', 24)->comment('销售员编码');
            $table->date('ctime')->default(now())->comment('创建时间');
            $table->date('utime')->default(now())->comment('修改时间');

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
        Schema::dropIfExists('fact_order');
    }
}
