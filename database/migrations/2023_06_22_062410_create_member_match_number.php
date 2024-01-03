<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMemberMatchNumber extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_match_number', function (Blueprint $table) {
            $table->id();
            
            $table->bigInteger('member_id')->unsigned();
            $table->foreign('member_id')
                ->references('id')->on('members')
                ->onDelete('cascade');

            $table->bigInteger('match_number_id')->unsigned();
            $table->foreign('match_number_id')
                ->references('id')->on('match_numbers')
                ->onDelete('cascade');
                
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('member_match_number');
    }
}
