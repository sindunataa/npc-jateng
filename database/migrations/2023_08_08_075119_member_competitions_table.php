<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class MemberCompetitionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('member_competitions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('member_id');
            $table->foreign('member_id')
                ->references('id')->on('members')
                ->onDelete('cascade');
            $table->unsignedBigInteger('competition_id');
            $table->foreign('competition_id')
                ->references('id')->on('competitions')
                ->onDelete('cascade');
            $table->enum('medal', ['gold', 'silver', 'bronze', 'participant']);
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
        //
    }
}
