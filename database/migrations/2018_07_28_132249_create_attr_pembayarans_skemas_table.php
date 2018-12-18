<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrPembayaransSkemasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_pembayaran_skema', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('skema_id_skema');
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
        Schema::table('attr_pembayaran_skema', function (Blueprint $table) {
            //
        });
    }
}
