<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();
        
        $redirectUrl = $this->getRedirectUrl($user);

        return $request->wantsJson()
            ? new JsonResponse([], 204)
            : redirect()->intended($redirectUrl);

        return redirect()->intended(RouteServiceProvider::HOME);
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
    // Custom method to determine the redirect URL based on the user's role_id
    protected function getRedirectUrl($user)
    {
        switch ($user->role_id) {
            case 1:
                return '/dashboard';
            case 0:
                return '/userprofile';
            // Add more cases for different role_ids as needed
            default:
                return '/';
        }
    }
}
