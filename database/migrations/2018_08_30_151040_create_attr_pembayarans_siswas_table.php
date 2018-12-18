<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAttrPembayaransSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('attr_pembayaran_siswa', function (Blueprint $table) {
            //
            $table->increments('id');
            $table->integer('attr_pembayaran_id_pembayaran');
            $table->integer('siswa_id_siswa');
            $table->integer('status')->default(0);
            $table->integer('id_admin')->default(0);
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
        Schema::table('attr_pembayaran_siswa', function (Blueprint $table) {
            //
        });
    }
}
