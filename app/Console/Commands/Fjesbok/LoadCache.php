<?php

namespace App\Console\Commands\Fjesbok;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class LoadCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fjesbok:loadcache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Load cache variables from database to cache';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        // Load active at timestamps
        $users = User::whereNotNull('last_active_at')->get();

        foreach($users as $user) {
            Cache::put('user-last-activity-' . $user->id, $user->last_active_at);
        }
    }
}
