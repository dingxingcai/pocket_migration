<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateZulinOrderExcp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('zulin_order', function (Blueprint $table) {
            $table->float('refundMoney',8,2)->nullable()->comment('退款金额')->change();
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
