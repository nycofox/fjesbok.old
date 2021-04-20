<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLogoToWebcomics extends Migration
{
    /**
     * Run the migrations.
     * Adds a link to media, allowing for a webcomic to have a logo
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webcomics', function (Blueprint $table) {
            $table->unsignedBigInteger('media_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webcomics', function (Blueprint $table) {
            $table->removeColumn('media_id');
        });
    }
}
