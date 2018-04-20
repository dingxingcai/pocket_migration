<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTableFactExpZulin extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('fact_exp_zulin', function (Blueprint $table) {
            $table->string('oid', 32)->comment('订单id');
            $table->string('order_id', 32)->comment('关联的具体订单id');

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
        Schema::dropIfExists('fact_exp_zulin');
    }
}
