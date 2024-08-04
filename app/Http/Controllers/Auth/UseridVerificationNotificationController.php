<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class UseridVerificationNotificationController extends Controller
{
    /**
     * Send a new Userid verification notification.
     */
    public function store(Request $request): RedirectResponse
    {
        if ($request->user()->hasVerifiedUserid()) {
            return redirect()->intended(route('dashboard', absolute: false));
        }

        $request->user()->sendUseridVerificationNotification();

        return back()->with('status', 'verification-link-sent');
    }
}
