<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;

class Deactivate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deactivate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Deativate user every month';

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
        $users = User::whereNotNull('email_verified_at')->get();

        foreach($users as $user){
            $user->update(['email_verified_at'=>null]);
        }
    }
}
