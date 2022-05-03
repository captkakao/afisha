<?php

namespace App\Services\Verification;

use App\Mail\EmailVerificationMail;
use App\Models\User;
use App\Models\UserEmailVerification;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class EmailVerificationService
{
    private User $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function sendVerificationLink(): void
    {
        $confirmationCode = $this->generateConfirmationCode();
        $emailVerification = $this->user->emailVerification()
            ->latest('last_sent_at')
            ->first();
        if (is_null($emailVerification)) {
            $emailVerification = new UserEmailVerification([
                'email' => $this->user->email,
                'code' => $confirmationCode,
                'last_sent_at' => Carbon::now(),
            ]);
            $this->user->emailVerification()->save($emailVerification);
        }
        else {
            $emailVerification->code = $confirmationCode;
            $emailVerification->last_sent_at = Carbon::now();
            $emailVerification->save();
        }
        // TODO

        $details = [
            'title' => 'test mail eww',
            'body' => 'This is teSst',
        ];

        Mail::to('soultouchka@gmail.com')->send(new EmailVerificationMail($details));
    }

    private function generateConfirmationCode(): string
    {
        return Str::random(80);
    }


    /**
     * Checks for correctness of confirmation code
     */
//    public function validateEmailConfirmationCode(string $confirmationCode): bool
//    {
//        $emailVerification = EmailVerificationRepository::getLastEmailVerification($this->user);
//
//        if ($emailVerification && $emailVerification->code === $confirmationCode)
//            return true;
//        return false;
//    }
//
//    /**
//     * Checks for code time expiration
//     */
//    public function validateEmailConfirmationTime(): bool
//    {
//        $emailVerification = EmailVerificationRepository::getLastEmailVerification($this->user);
//        $lastSentAt = strtotime($emailVerification->last_sent_at);
//        $now = strtotime(Carbon::now());
//        $totalSecondsDiff = abs($now - $lastSentAt);
//        if ($totalSecondsDiff < config('services.email_expiration_time_sec')) {
//            return true;
//        }
//        return false;
//    }
}
