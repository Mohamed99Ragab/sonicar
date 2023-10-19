<?php

namespace App\Jobs;

use App\Mail\SubscriptionMail;
use App\Models\Subscription;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendNewsToUserSubscriptionJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    protected $blog;
    public function __construct($blog)
    {
        $this->blog = $blog;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {

        if ($this->blog->status == '1'){

            $subscriptions = Subscription::get();

            foreach ($subscriptions as $subscription)
            {

                Mail::to($subscription->email)->send(new SubscriptionMail($this->blog));

            }
        }

    }
}
