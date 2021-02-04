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
            $table->integer('lingkar_badan')->nullable();
            $table->integer('lingkar_pinggang')->nullable();
            $table->integer('lingkar_pinggul')->nullable();
            $table->integer('lebar_muka')->nullable();
            $table->integer('lebar_punggung')->nullable();
            $table->integer('panjang_punggung')->nullable();
            $table->integer('panjang_muka')->nullable();
            $table->integer('panjang_baju')->nullable();
            $table->integer('panjang_lengan')->nullable();
            $table->integer('lebar_lengan')->nullable();
            $table->integer('panjang_rok')->nullable();
            $table->integer('panjang_celana')->nullable();
            $table->integer('lingkar_pipa')->nullable();
            $table->integer('lingkar_paha')->nullable();
            $table->integer('lingkar_lutut')->nullable();
            $table->integer('panjang_krah')->nullable();
            $table->integer('lebar_ban_lengan')->nullable();
            $table->enum("status", ["PROCESS", "SUCCESS"]);
            $table->integer('invoice')->nullable();
            $table->string('avatar')->nullable();
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
