<?php

namespace App\Http\Controllers\Verification;

use App\Exceptions\ApiResponseException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Verification\VerifyEmailCodeRequest;
use App\Http\Requests\Verification\VerifyEmailRequest;
use App\Models\User;
use App\Models\UserEmailVerification;
use App\Services\Verification\EmailVerificationService;
use Symfony\Component\HttpFoundation\Response;

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

    /**
     * @throws ApiResponseException
     */
    public function confirm(VerifyEmailCodeRequest $request)
    {
        $user = User::where('email', $request->email)->first();

        $emailVerificationService = new EmailVerificationService($user);

        if (!$emailVerificationService->validateEmailConfirmationCode($request->code)) {
            throw new ApiResponseException(__('verify_email.invalid_code'), 'invalid_code', Response::HTTP_UNPROCESSABLE_ENTITY);
        }

        if (!$emailVerificationService->validateEmailConfirmationTime()) {
            throw new ApiResponseException(__('verify_email.token_expired'), 'token_expired');
        }

        User::where('id', $user->id)
            ->update([
                'email_verified_at' => now()
            ]);
        UserEmailVerification
            ::where('user_id', $user->id)
            ->delete();

        return response(null);
    }
}
