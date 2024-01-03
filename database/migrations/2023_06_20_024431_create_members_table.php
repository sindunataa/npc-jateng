<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMembersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('uuid');
            $table->string('name');
            $table->string('nik');
            $table->enum('peserta', ['official', 'atlet']);
            $table->enum('status', ['kuota', 'non kuota']);
            $table->string('place_of_birth');
            $table->date('date_of_birth');
            $table->text('address');
            $table->enum('type', ['Disabilitas Fisik', 'Disabilitas Intelektual', 'Disabilitas Netra']);
            $table->enum('gender', ['Putra', 'Putri']);
            $table->enum('category', ['Elite 1', 'Elite 2', 'Elite 3', 'Non Elite', 'Official']);
            $table->integer('npci_daerah');
            $table->integer('contingent_id');
            $table->integer('cabor_id');
            $table->enum('wheelchair', ['ya', 'tidak']);
            $table->text('file_foto');
            $table->text('file_ktp');
            $table->text('file_pendukung');
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
        Schema::dropIfExists('members');
    }
}
