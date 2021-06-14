<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Transaction extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('Transaction', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->integer('product_id');
            $table->string('nama');
            $table->string('email');
            $table->string('no_telpon');
            $table->string('alamat');
            $table->integer('admin_id');
            $table->integer('total_transaksi');
            $table->integer('status_transaksi');
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
        //
    }
}
