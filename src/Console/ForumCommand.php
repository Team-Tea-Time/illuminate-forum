<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ForumCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'forum:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the forum and initial setup';

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
     * @return mixed
     */
    public function handle()
    {
        //
    }
}
