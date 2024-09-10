<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Laravel\Socialite\Facades\Socialite;

class SocialiteController extends Controller
{
    public function login(Request $request, string $provider): RedirectResponse
    {
        if (!in_array($provider, ['google', 'github'])) {
            return redirect()->back()->withErrors(['provider' => 'Invalid provider']);
        }

        redirect()->setIntendedUrl($request->input('redirect'));

        return Socialite::driver($provider)->redirect();
    }

    public function callback(Request $request, string $provider)
    {
        if (!in_array($provider, ['google', 'github'])) {
            return redirect()->back()->withErrors(['provider' => 'Invalid provider']);
        }

        $socialiteUser = Socialite::driver($provider)->user();

        $user = User::updateOrCreate(
            ['email' => $socialiteUser->getEmail()],
            [
                'name' => $socialiteUser->getName() ?? $socialiteUser->getNickname(),
                'password' => Str::password(),
                "{$provider}_id" => $socialiteUser->getId(),
                'avatar' => $socialiteUser->getAvatar(),
            ]
        );

        if ($user->wasRecentlyCreated) {
            event(new Registered($user));
        }

        Auth::login($user, true);

        return redirect()->intended('/');
    }
}
