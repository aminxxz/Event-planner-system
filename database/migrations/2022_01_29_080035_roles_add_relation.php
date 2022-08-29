<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class RolesAddRelation extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->bigInteger('stud_id')->unsigned()->index();
            $table->foreign('stud_id')->references('stud_id')->on('committees')->onDelete('cascade');
            $table->bigInteger('event_id')->unsigned()->index();
            $table->foreign('event_id')->references('event_id')->on('events')->onDelete('cascade');
            $table->bigInteger('pm_id')->unsigned()->index();
            $table->foreign('pm_id')->references('pm_id')->on('post_mortems')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function (Blueprint $table) {
            $table->dropForeign('stud_id');
            $table->dropForeign('event_id');
            $table->dropForeign('pm_id');
        });
    }
}
