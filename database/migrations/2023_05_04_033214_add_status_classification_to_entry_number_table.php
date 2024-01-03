<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddStatusClassificationToEntryNumberTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entry_numbers', function (Blueprint $table) {
            //
            $table->enum('status_classification', ['Confirm International', 'Confirm Nasional', 'Confirm Daerah', 'Review Nasional','Review Daerah', 'New']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entry_numbers', function (Blueprint $table) {
            //
            $table->dropColumn('status_classification');
        });
    }
}
