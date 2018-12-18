<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrPembayaransTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_pembayarans', function (Blueprint $table) {
            $table->increments('id_pembayaran');
            $table->string('namaAttr');
            $table->integer('jumlah');
            $table->integer('id_period');
            $table->date('startDate');
            $table->date('endDate');            
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
        Schema::dropIfExists('attr_pembayarans');
    }
}
