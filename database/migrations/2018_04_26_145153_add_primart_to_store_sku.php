<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPrimartToStoreSku extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dim_sku', function (Blueprint $table) {
            $table->primary('sku_code')->change();
        });

        Schema::table('dim_store', function (Blueprint $table) {
            $table->primary('store_code')->change();
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
