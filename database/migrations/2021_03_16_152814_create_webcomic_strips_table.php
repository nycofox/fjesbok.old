<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWebcomicStripsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('webcomic_strips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('webcomic_source_id');
            $table->foreignId('media_id');
            $table->text('title')->nullable();
            $table->text('description')->nullable();
            $table->text('transcript')->nullable();
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
        Schema::dropIfExists('webcomic_strips');
    }
}
