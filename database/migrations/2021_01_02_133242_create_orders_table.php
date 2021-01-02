<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('owner_id');
            $table->unsignedBigInteger('operator_id');
            $table->unsignedBigInteger('courier_id');
            $table->string('from');
            $table->string('to');
            $table->string('preference')->nullable();
            $table->string('size');
            $table->string('weight');
            $table->string('status');
            $table->timestamp('processing_time')->nullable();
            $table->timestamp('execute_time')->nullable();
            $table->string('recipient_contacts');
            $table->double('sum')->nullable();
            $table->timestamp('approximate_time')->nullable();
            $table->timestamps();

            $table->foreign('owner_id')->references('id')->on('users');
            $table->foreign('operator_id')->references('id')->on('users');
            $table->foreign('courier_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
