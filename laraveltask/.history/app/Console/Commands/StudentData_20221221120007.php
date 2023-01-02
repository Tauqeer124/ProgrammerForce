<?php

namespace App\Console\Commands;
use App\Models\Student;
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
        if($this->arg){

        }else{
        $std=Student::get(['id','student_name']);
        $this->table(['id','student_name'],$std);
        echo "Student data showing";
        // return Command::SUCCESS;
        }
    }
}
