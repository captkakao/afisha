<?php

namespace App\Services\Verification;

use App\Jobs\SendTicketJob;
use App\Jobs\SendVerificationLinkJob;
use App\Mail\EmailVerificationMail;
use App\Mail\TicketMail;
use App\Models\Seance;
use App\Models\User;
use App\Models\UserEmailVerification;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\Authenticatable;
use Illuminate\Support\Str;

class EmailVerificationService
{
    private User|Authenticatable $user;

    public function __construct(User|Authenticatable $user)
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
        } else {
            $emailVerification->code = $confirmationCode;
            $emailVerification->last_sent_at = Carbon::now();
            $emailVerification->save();
        }

        $verificationLink = config('services.afisha_frontend_url') . '/email-verification?email=' . $this->user->email . '&confirmation_code=' . $confirmationCode;

        $details = [
            'view' => 'verification.email.verification-link',
            'title' => 'Welcome to Afisha',
            'body' => [
                'verification_link' => $verificationLink,
            ],
        ];

        SendVerificationLinkJob::dispatch($this->user->email, new EmailVerificationMail($details));
    }

    private function generateConfirmationCode(): string
    {
        return Str::random(80);
    }


    /**
     * Checks for correctness of confirmation code
     */
    public function validateEmailConfirmationCode(string $confirmationCode): bool
    {
        $emailVerification = $this->user->emailVerification()
            ->latest('last_sent_at')
            ->first();

        if ($emailVerification && $emailVerification->code === $confirmationCode)
            return true;
        return false;
    }

    /**
     * Checks for code time expiration
     */
    public function validateEmailConfirmationTime(): bool
    {
        $emailVerification = $this->user->emailVerification()
            ->latest('last_sent_at')
            ->first();
        $lastSentAt = strtotime($emailVerification->last_sent_at);
        $now = strtotime(Carbon::now());
        $totalSecondsDiff = abs($now - $lastSentAt);
        if ($totalSecondsDiff < config('services.email_expiration_time_sec')) {
            return true;
        }
        return false;
    }

    public function sendTicket(int $seanceId, int $row, int $column): void
    {
        $seance = Seance::query()
            ->with('movie')
            ->where('id', $seanceId)
            ->first();

        $details = [
            'view' => 'ticket.email.ticket',
            'title' => 'Ticket to ' . $seance->movie->name,
            'body' => [
                'text' => 'Ticket to ' . $seance->movie->name . ' at ' . $seance->show_time . '. Your seat is at row: ' . $row . ' column: ' . $column . '. Hava a nice seance!',
            ],
        ];

        SendTicketJob::dispatch($this->user->email, new TicketMail($details));
    }
}
