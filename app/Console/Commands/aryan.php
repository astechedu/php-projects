<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class aryan extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:get_user_id';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description by Ajay';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //
        echo "user id: 1  FilePath: app/console/commands/aryan";
    }
}
