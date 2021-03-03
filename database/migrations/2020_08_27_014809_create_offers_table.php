<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOffersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('offers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('sabi_man_id');
            $table->foreign('sabi_man_id')->references('id')->on('users');
            $table->foreignId('sabi_hunter_id')->nullable();
            $table->foreign('sabi_hunter_id')->references('id')->on('users');
            $table->text('description');
            $table->string('type');
            $table->double('initial_amount',8,2);
            $table->double('counter_amount',8,2)->nullable();
            $table->string('status',100);
            $table->string('sabi_man_status',100)->nullable();
            $table->string('sabi_hunter_status',100)->nullable();
            $table->string('file_path',255)->nullable();
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
        Schema::dropIfExists('offers');
    }
}
