<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddConfirmationColumnsToLeavesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->boolean('manager_confirmation')->default(false);
            $table->boolean('hr_confirmation')->default(false);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('leaves', function (Blueprint $table) {
            $table->dropColumn('manager_confirmation');
            $table->dropColumn('hr_confirmation');
        });
    }
}
