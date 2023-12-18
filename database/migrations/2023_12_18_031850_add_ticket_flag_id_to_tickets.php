<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddTicketFlagIdToTickets extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->unsignedBigInteger('ticket_flag_id')->nullable();
            $table->foreign('ticket_flag_id')->references('id')->on('ticket_flags');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tickets', function (Blueprint $table) {
            $table->dropForeign(['ticket_flag_id']);
            $table->dropColumn('ticket_flag_id');
        });
    }
}
