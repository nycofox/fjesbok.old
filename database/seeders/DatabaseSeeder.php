<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\App;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            AdminSeeder::class,
        ]);

        /**
         * Only run these migrations in a local environment
         */
        if (App::environment('local')) {
            $this->call([
                DevSeeder::class,
            ]);
        }
    }
}
