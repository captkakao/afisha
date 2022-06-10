<?php

namespace App\Http\Controllers;

use App\Http\Requests\Ticket\SendTicketRequest;
use App\Services\Verification\EmailVerificationService;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    public function sendTicket(SendTicketRequest $request)
    {
        (new EmailVerificationService(Auth::user()))->sendTicket($request->seance_id);

        return response()->json([
            'resend_timeout' => (int)config('services.email_resend_timeout_sec'),
        ]);
    }
}
