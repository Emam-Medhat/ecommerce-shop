<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class GoogleController extends Controller
{
    public function redirectToGoogle()
    {
        return Socialite::driver('google')->stateless()->redirect();  // stateless هنا
    }

    public function handleGoogleCallback()
    {
        try {
            $googleUser = Socialite::driver('google')->stateless()->user();

            $user = User::where('email', $googleUser->getEmail())->first();

            if ($user) {
                // المستخدم موجود - تسجيل دخول
                Auth::login($user);
                return redirect()->route('profile.show')->with('success', 'تم تسجيل الدخول بنجاح');
            }

            // إنشاء مستخدم جديد
            $newUser = User::create([
                'name' => $googleUser->getName() ?? 'مستخدم Google',
                'email' => $googleUser->getEmail(),
                'profile_picture' => $googleUser->getAvatar() ?? 'default-avatar.png',
                'password' => Hash::make(Str::random(20)),
                'email_verified_at' => now(),
                'role' => 'user',
                'phone' => '', // قيم افتراضية للحقول المطلوبة
                'address' => '', // قيم افتراضية للحقول المطلوبة
            ]);

            Auth::login($newUser);
            return redirect()->route('profile.show')->with('success', 'تم إنشاء حسابك وتسجيل الدخول بنجاح');

        } catch (Exception $e) {
            \Log::error('Google Callback Error: ' . $e->getMessage());
            \Log::error('Stack trace: ' . $e->getTraceAsString());
            return redirect()->route('login')->with('error', 'فشل تسجيل الدخول عبر Google. يرجى المحاولة مرة أخرى.');
        }
    }
}
