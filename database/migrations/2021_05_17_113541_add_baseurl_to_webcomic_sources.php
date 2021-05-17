<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBaseurlToWebcomicSources extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('webcomic_sources', function (Blueprint $table) {
            $table->string('baseurl')->after('searchpage')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('webcomic_sources', function (Blueprint $table) {
            $table->dropColumn('baseurl');
        });
    }
}
