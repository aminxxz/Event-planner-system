<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeFkRoles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('roles', function(Blueprint $table){
            $table->dropForeign('roles_pm_id_foreign');
            $table->dropColumn('pm_id');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('roles', function(Blueprint $table){
        $table->bigInteger('pm_id')->unsigned()->index();
        $table->foreign('pm_id')->references('pm_id')->on('post_mortems')->onDelete('cascade');
        });
    }
}
