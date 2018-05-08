<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnToDimSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dim_sku', function (Blueprint $table) {
            $table->dropPrimary('sku_code');
            $table->addColumn('string', 'from', ['length' => 12])->nullable()->comment('来源');
            $table->addColumn('string', 'sku_id', ['length' => 128])->comment('主键,也是商品id');
            $table->primary('sku_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dim_sku', function (Blueprint $table) {
            //
        });
    }
}
