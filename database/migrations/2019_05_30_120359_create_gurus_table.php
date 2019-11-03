<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGurusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gurus', function (Blueprint $table) {
            $table->increments('id');
             $table->string('nama_guru');
            $table->string('nip_guru');
            $table->string('email_guru');
            $table->date('password_guru');
            $table->text('alamat');
            $table->string('jenis_kelamin_guru');
            $table->string('no_tlp_guru');
            $table->string('jabatan_guru');
            $table->boolean('status_aktif_guru');
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
        Schema::dropIfExists('gurus');
    }
}
