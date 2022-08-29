<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPkPm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('post_mortems', function (Blueprint $table) {
            $table->bigInteger('role_id')->unsigned()->index();
            $table->foreign('role_id')->references('role_id')->on('roles')->onDelete('cascade');
        });
        
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('post_mortems', function (Blueprint $table) {
            $table->dropForeign('role_id');
        });
        
    }
}
