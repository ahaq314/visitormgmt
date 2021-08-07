<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VisitorsLogTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('visitors_log', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('visitor_id');
            $table->foreign('visitor_id')->references('id')->on('visitors_info');
            $table->dateTime('check_in');
            $table->dateTime('check_out');
            $table->text('purpose')->nullable();
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
        Schema::dropIfExists('visitors_log');
    }
}
