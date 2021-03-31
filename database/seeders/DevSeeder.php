<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
use App\Models\Webcomic;
use App\Models\WebcomicSource;
use Illuminate\Database\Seeder;

class DevSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        WebcomicSource::factory(4)->create();

        Post::factory(50)->create();
    }

}
