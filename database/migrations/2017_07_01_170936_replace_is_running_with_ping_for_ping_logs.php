<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ReplaceIsRunningWithPingForPingLogs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ping_logs', function (Blueprint $table) {
            $table->dropColumn('is_running');

            $table->double('ping');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ping_logs', function (Blueprint $table) {
            $table->dropColumn('ping');

            $table->boolean('is_running');
        });
    }
}
