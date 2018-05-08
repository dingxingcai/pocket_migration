<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fact_order_sku', function (Blueprint $table) {
            $table->addColumn('string', 'sales_code',['length' => 64])->nullable()->comment('销售人员');
        });

        Schema::table('dim_store', function (Blueprint $table) {
            $table->addColumn('string','from',['length' => 64])->nullable()->comment('数据来源');
        });

        Schema::table('dim_sales',function(Blueprint $table){
            $table->addColumn('string','from',['length' => 64])->nullable()->comment('数据来源');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
