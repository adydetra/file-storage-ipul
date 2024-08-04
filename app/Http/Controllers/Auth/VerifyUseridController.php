<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Auth\UseridVerificationRequest;
use Illuminate\Http\RedirectResponse;

class VerifyUseridController extends Controller
{
    /**
     * Mark the authenticated user's Userid address as verified.
     */
    public function __invoke(UseridVerificationRequest $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedUserid()) {
            return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
        }

        if ($request->user()->markUseridAsVerified()) {
            event(new Verified($request->user()));
        }

        return redirect()->intended(route('dashboard', absolute: false).'?verified=1');
    }
}
