<?php

namespace App\Http\Controllers\Verification;

use App\Exceptions\ApiResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Verification\VerifyEmailRequest;
use App\Models\User;
use App\Services\Verification\EmailVerificationService;
use Illuminate\Http\Request;

class EmailVerificationController extends Controller
{
    /**
     * @throws ApiResponseException
     */
    public function send(VerifyEmailRequest $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user->hasVerifiedEmail()) {
            throw new ApiResponseException(__('auth.email_already_confirmed'), 'email_confirmed');
        }

        (new EmailVerificationService($user))->sendVerificationLink();

        return response()->json([
            'resend_timeout' => (int)config('services.email_resend_timeout_sec'),
        ]);
    }

    public function confirm()
    {

    }
}
