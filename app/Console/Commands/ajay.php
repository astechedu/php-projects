<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class ajay extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get all data from users table by Ajay';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        //echo "name: ajay, age:32  FilePath: app/console/commands/ajay";
        echo "h:";
    }
}
