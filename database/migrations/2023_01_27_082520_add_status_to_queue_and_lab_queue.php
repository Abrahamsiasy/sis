<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('queues', function (Blueprint $table) {
            //
            $table->string('status')->default("0");
        });

        Schema::table('lab_queues', function (Blueprint $table) {
            //
            $table->string('status')->default("0");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('queues', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });

        Schema::table('lab_queues', function (Blueprint $table) {
            //
            $table->dropColumn('status');
        });
    }
};
