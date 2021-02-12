<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use App\User;
use Illuminate\Support\Facades\Mail;

class cronEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'notify:email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send a Daily email to all users. Thanking them for being our customer.';

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
        $users = DB::table('users');
        $words = "Thankyou! For being a valuable customer to our store.";

//        // Finding a random word
//        $key = array_rand($words);
//        $value = $words[$key];

        $users = User::all();
        foreach ($users as $user) {
            Mail::raw("{$user->name}...{$words}", function ($mail) use ($user) {
                $mail->from('uttam29mittal@gmail.com');
                $mail->to($user->email)
                    ->subject('Thankyou');
            });
        }

        $this->info('Thankyou Mail sent to All Users');
    }
}
