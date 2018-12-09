<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserBalancesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_balances', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('balance_id')->unsigned()->default(null);
            $table->foreign('balance_id')->references('id')->on('balances')->onDelete('cascade');
            $table->integer('user_id')->default(null);
            $table->integer('referal_id')->default(null);
            $table->integer('amount')->default(null);
            $table->index('balance_id','balance_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_balances');
    }
}
