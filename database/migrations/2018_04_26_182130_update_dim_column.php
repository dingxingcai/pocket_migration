<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateDimColumn extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dim_store', function (Blueprint $table) {
            $table->addColumn('string', 'storeId', ['length' => 32])->nullable()->comment('门店id');
        });

        Schema::table('dim_sales', function (Blueprint $table) {
            $table->addColumn('string', 'eTypeId', ['length' => 32])->nullable()->comment('店员id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dim_store', function (Blueprint $table) {
            //
        });
    }
}
