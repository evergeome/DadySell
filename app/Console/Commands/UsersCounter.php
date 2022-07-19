<?php

namespace App\Console\Commands;

use App\Mail\UsersCounterMail;
use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class UsersCounter extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'users:count';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sending the number of registered users to admin';

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
        $count = User::count();
        $array = ['title'=>'Users Count','name'=>'Karim','count'=>$count];
        Mail::to(env('ADMIN_MAIL'))->send(new UsersCounterMail($array));
    }
}
