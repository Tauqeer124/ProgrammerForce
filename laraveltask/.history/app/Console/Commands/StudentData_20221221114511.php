<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class StudentData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Student Data Command';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        return Command::SUCCESS;
    }
}
