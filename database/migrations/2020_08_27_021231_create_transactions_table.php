<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->id();
            $table->string('transactionId',255);
            $table->unique('transactionId');
            $table->foreignId('user_id')->nullable();
            $table->foreign('user_id')->references('id')->on('users');
            $table->foreignId('sabi_man_id')->nullable();
            $table->foreign('sabi_man_id')->references('id')->on('users');
            $table->foreignId('sabi_hunter_id')->nullable();
            $table->foreign('sabi_hunter_id')->references('id')->on('users');
            $table->text('offer_description')->nullable();
            $table->foreignId('offer_id')->nullable();
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->string('status',100);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
