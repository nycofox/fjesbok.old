<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDefaultAlbumsForExistingUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        foreach(\App\Models\User::all() as $user) {
            \App\Models\Album::create([
                'type' => 'p',
                'name' => 'Profile Pictures',
                'user_id' => $user->id,
                'system' => true
            ]);

            \App\Models\Album::create([
                'type' => 't',
                'name' => 'Timeline Pictures',
                'user_id' => $user->id,
                'system' => true
            ]);
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
