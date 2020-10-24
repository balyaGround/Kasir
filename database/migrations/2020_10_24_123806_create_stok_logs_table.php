<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateStokLogsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('stok_logs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('bahan_id');
            $table->integer('aksi_quantity');
            $table->integer('aksi');
            $table->integer('sebelum_quantity');
            $table->integer('final_quantity');
            $table->integer('produk_id');
            $table->integer('toko_id');
            $table->integer('user_id');
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
        Schema::dropIfExists('stok_logs');
    }
}
