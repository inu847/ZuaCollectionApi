<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBajuTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bajus', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->enum("kategori", ["Atasan Wanita", "Hem", "Safari", "Semi Safari", "Rok", "Gamis", "Celana"]);
            $table->enum('jenis_ukuran', ["Ukuran Badan", "Baju Jadi"]);
            $table->integer('lingkar_badan');
            $table->integer('lingkar_pinggang');
            $table->integer('lingkar_pinggul');
            $table->integer('lebar_muka');
            $table->integer('lebar_punggung');
            $table->integer('panjang_punggung');
            $table->integer('panjang_muka');
            $table->integer('panjang_baju');
            $table->integer('panjang_lengan');
            $table->integer('lebar_lengan');
            $table->integer('panjang_rok');
            $table->integer('panjang_celana');
            $table->integer('lingkar_pipa');
            $table->integer('lingkar_paha');
            $table->integer('lingkar_lutut');
            $table->integer('panjang_krah');
            $table->integer('lebar_ban_lengan');
            $table->enum("status", ["PROCESS", "SUCCESS"]);
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
        Schema::dropIfExists('baju');
    }
}
