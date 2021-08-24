<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use App\Services\Activity;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     *
     * @param  \App\Http\Requests\Auth\LoginRequest  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(LoginRequest $request)
    {
        $request->authenticate();

        $request->session()->regenerate();
        if(!auth()->user()->is_active) {
            Activity::eventLogs([
                'user_id' => auth()->user()->id,
                'activity' => 'login',
                'description' => 'failed login, user not active',
            ]);
            auth()->logout();
            return redirect()->route('login')->with('info', 'Your <b>credential</b> is not active.');
        }

        Activity::eventLogs([
            'user_id' => auth()->user()->id,
            'activity' => 'login',
            'description' => 'login to application',
        ]);

        return redirect()->intended(env('APP_PREFIX').RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy(Request $request)
    {
        Activity::eventLogs([
            'user_id' => auth()->user()->id,
            'activity' => 'logout',
            'description' => 'logout from application',
        ]);

        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
