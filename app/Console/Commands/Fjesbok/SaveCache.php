<?php

namespace App\Console\Commands\Fjesbok;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Cache;

class SaveCache extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fjesbok:savecache';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Saves all important cache settings before reset';

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
        // Save last_active_at
        $users = User::all();

        foreach($users as $user) {
            if(Cache::has('user-last-activity-' . $user->id)) {
                $this->info('User with email ' . $user->email . ' had cache, updating database.');
                User::whereId($user->id)->update(
                    ['last_active_at' => Carbon::createFromFormat('Y-m-d H:i:s', Cache::get('user-last-activity-' . $user->id))]
                );
            }
        }

    }
}
