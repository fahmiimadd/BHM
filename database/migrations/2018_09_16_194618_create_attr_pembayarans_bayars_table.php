<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrPembayaransBayarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_pembayaran_bayar', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('bayar_id_bayar');
            $table->integer('attr_pembayaran_id_pembayaran');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('attr_pembayaran_bayar', function (Blueprint $table) {
            //
        });
    }
}
