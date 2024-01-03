<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEntryNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('entry_numbers', function (Blueprint $table) {
            $table->id();
            $table->enum('status', ['Disabilitas Fisik', 'Disabilitas Intelektual', 'Disabilitas Netra', 'Tuna Daksa']);
            $table->enum('gender', ['putra', 'putri', 'mixed']);
            $table->integer('jumlah');
            $table->integer('match_number_id');
            $table->integer('classification_id');
            $table->integer('contingent_id');
            $table->integer('cabor_id');
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
        Schema::dropIfExists('entry_numbers');
    }
}
