<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class TwitterController extends Controller
{
    // التوجيه لصفحة تسجيل الدخول بتويتر
    public function redirectToTwitter()
    {
        return Socialite::driver('twitter')->redirect();
    }

    // معالجة البيانات بعد العودة من تويتر
    public function handleTwitterCallback()
    {
        try {
            $twitterUser = Socialite::driver('twitter')->user();

            $user = User::firstOrCreate(
                ['email' => $twitterUser->getEmail() ?? 'twitter_'.$twitterUser->getId().'@example.com'],
                [
                    'name' => $twitterUser->getName() ?? 'مستخدم Twitter',
                    'profile_picture' => $twitterUser->getAvatar() ?? 'default-avatar.png',
                    'password' => Hash::make(Str::random(20)),
                    'email_verified_at' => now(),
                    'role' => 'user',
                ]
            );

            Auth::login($user);

            return redirect()->route('profile.show')->with('success', 'تم تسجيل الدخول عبر Twitter بنجاح');

        } catch (Exception $e) {
            \Log::error('Twitter Callback Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'فشل تسجيل الدخول عبر Twitter. يرجى المحاولة مرة أخرى.');
        }
    }
}
