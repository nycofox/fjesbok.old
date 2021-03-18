<?php

namespace App\Console\Commands;

use App\Models\WebcomicSource;
use Illuminate\Console\Command;

class WebcomicScraper extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'webcomics:scrape';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Scrapes all active Webcomics and their sources';

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
        $sources = WebcomicSource::whereActive(true)->with('webcomic')->get();

        foreach($sources as $source)
        {
            $this->info($source->webcomic->name . ' - Processing source ' . $source->name);
        }


    }
}
