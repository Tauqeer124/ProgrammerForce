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
    protected $signature = 'student:data{id?}';

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
        if($this->argument('id')){
            $std=Student::whereId($this->argument('id'))->get(['id','Student_name']);
            if(count($std)>o){
            $this->table(['id','student_name'],$std);
            }
            else{
                $this->error('studnent not exist enter valid ID');
            }

        }else{
        $std=Student::get(['id','student_name']);
        $this->table(['id','student_name'],$std);
        echo "Student data showing";
        // return Command::SUCCESS;
        }
    }
}