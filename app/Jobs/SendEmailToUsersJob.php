<?php

namespace App\Jobs;

use App\Mail\NotifyAllUserMail;
use App\Models\FreeQuote;
use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendEmailToUsersJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $message;
    protected $auth;

    public function __construct($message , $auth)
    {
        $this->message = $message;
        $this->auth = $auth;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $usersQuote = FreeQuote::select('name','email')->distinct()->get();


        foreach ($usersQuote as $item){


            Mail::to($item->email)->send(new NotifyAllUserMail($this->message));

        }
    }
}
