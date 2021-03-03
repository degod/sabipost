<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOfferBidsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offer_bids', function (Blueprint $table) {
            $table->id();
            $table->foreignId('offer_id');
            $table->foreign('offer_id')->references('id')->on('offers');
            $table->foreignId('sabi_hunter_id');
            $table->foreign('sabi_hunter_id')->references('id')->on('users');
            $table->double('bid_amount',8,2);
            $table->double('reoffer_amount',8,2)->nullable();
            $table->string('sabi_man_status',100)->nullable();
            $table->string('sabi_hunter_status',100)->nullable();
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
        Schema::dropIfExists('offer_bids');
    }
}
