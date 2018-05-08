<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ZulinOrderCode extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zulin_order', function (Blueprint $table) {
            $table->addColumn('string','sku_code',['length' => 64])->nullable()->comment('商品统一编码');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('zulin_order', function (Blueprint $table) {
            //
        });
    }
}
