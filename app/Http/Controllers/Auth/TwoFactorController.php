<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;
use PragmaRX\Google2FA\Google2FA;

class TwoFactorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->only(['showSetup', 'generateSecret']);
    }

    public function showSetup(Request $request): View
    {
        $user = $request->user();
        $hasSecret = ! empty($user->google2fa_secret);
        return view('auth.2fa-setup', [
            'hasSecret' => $hasSecret,
            'secret' => $user->google2fa_secret,
            'qrCodeUrl' => null,
        ]);
    }

    public function generateSecret(Request $request, Google2FA $google2fa): View
    {
        $user = $request->user();
        $secret = $google2fa->generateSecretKey(16);
        $user->google2fa_secret = $secret;
        $user->save();

        $otpAuthUrl = $google2fa->getQRCodeUrl(
            config('app.name'),
            $user->email,
            $secret
        );

        $qrCodeUrl = 'https://chart.googleapis.com/chart?chs=300x300&cht=qr&chl=' . urlencode($otpAuthUrl);

        return view('auth.2fa-setup', [
            'hasSecret' => true,
            'secret' => $secret,
            'qrCodeUrl' => $qrCodeUrl,
        ]);
    }

    public function index(Request $request): View
    {
        if (! $request->session()->has('2fa:user:id')) {
            return redirect()->route('login');
        }

        return view('auth.twofactor');
    }

    public function verify(Request $request): RedirectResponse
    {
        $request->validate([
            'one_time_password' => ['required', 'string'],
        ]);

        $userId = $request->session()->get('2fa:user:id');
        $user = \App\Models\User::find($userId);

        if (! $user || ! $user->google2fa_secret) {
            return redirect()->route('login')->withErrors(['email' => 'Incapable de vérifier le code d\'authentification. Veuillez vous reconnecter.']);
        }

        $google2fa = app(Google2FA::class);
        $valid = $google2fa->verifyKey($user->google2fa_secret, $request->input('one_time_password'), 1);

        if (! $valid) {
            return back()->withErrors(['one_time_password' => 'Code d\'authentification invalide.'])->withInput();
        }

        Auth::login($user, $request->session()->pull('2fa:remember', false));
        $request->session()->forget(['2fa:user:id', '2fa:remember']);
        $request->session()->regenerate();

        return redirect()->intended(route('dashboard', absolute: false));
    }
}
