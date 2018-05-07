<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddTypeToFactOrderSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('fact_order_sku', function (Blueprint $table) {
            $table->string('business_type')->comment('业务类型');
        });
    }

    /**
     * Reverse the migrations.t
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fact_order_sku', function (Blueprint $table) {
            //
        });
    }
}
