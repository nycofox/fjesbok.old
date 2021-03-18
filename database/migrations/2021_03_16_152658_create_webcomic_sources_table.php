<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebcomicSourcesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webcomic_sources', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webcomic_id');
            $table->string('name');
            $table->string('homepage');
            $table->string('searchpage')->nullable();
            $table->string('searchstring')->nullable();
            $table->string('scraper');
            $table->boolean('active')->default(true);
            $table->timestamp('last_scraped_at')->nullable();
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
        Schema::dropIfExists('webcomic_sources');
    }
}
