<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class GitHubController extends Controller
{
    // التوجيه إلى صفحة GitHub لتسجيل الدخول
    public function redirectToGitHub()
    {
        return Socialite::driver('github')->redirect();
    }

    // معالجة البيانات بعد عودة المستخدم من GitHub
    public function handleGitHubCallback()
    {
        try {
            $githubUser = Socialite::driver('github')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $githubUser->getEmail()],
                [
                    'name' => $githubUser->getName() ?? $githubUser->getNickname() ?? 'مستخدم GitHub',
                    'profile_picture' => $githubUser->getAvatar() ?? 'default-avatar.png',
                    'password' => Hash::make(Str::random(20)),
                    'email_verified_at' => now(),
                    'role' => 'user',
                    'phone' => '',
                    'address' => '',
                ]
            );

            Auth::login($user);

            return redirect()->route('profile.show')->with('success', 'تم تسجيل الدخول عبر GitHub بنجاح');
        } catch (Exception $e) {
            \Log::error('GitHub Callback Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'فشل تسجيل الدخول عبر GitHub. يرجى المحاولة مرة أخرى.');
        }
    }
}

