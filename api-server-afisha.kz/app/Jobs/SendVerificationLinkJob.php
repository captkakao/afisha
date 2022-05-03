<?php

namespace App\Jobs;

use App\Mail\EmailVerificationMail;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;

class SendVerificationLinkJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    private string $emailTo;
    private EmailVerificationMail $emailVerificationMail;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $emailTo, EmailVerificationMail $emailVerificationMail)
    {
        $this->emailTo = $emailTo;
        $this->emailVerificationMail = $emailVerificationMail;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        Mail::to($this->emailTo)->send($this->emailVerificationMail);
    }
}
