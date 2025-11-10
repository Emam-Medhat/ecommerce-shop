<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Exception;

class FacebookController extends Controller
{
    // التوجيه إلى صفحة فيسبوك لتسجيل الدخول
    public function redirectToFacebook()
    {
        return Socialite::driver('facebook')->redirect();
    }

    // معالجة البيانات بعد عودة المستخدم من فيسبوك
    public function handleFacebookCallback()
    {
        try {
            $facebookUser = Socialite::driver('facebook')->stateless()->user();

            $user = User::firstOrCreate(
                ['email' => $facebookUser->getEmail()],
                [
                    'name' => $facebookUser->getName() ?? 'مستخدم Facebook',
                    'profile_picture' => $facebookUser->getAvatar() ?? 'default-avatar.png',
                    'password' => Hash::make(Str::random(20)),
                    'email_verified_at' => now(),
                    'role' => 'user',
                    'phone' => '',
                    'address' => '',
                ]
            );

            Auth::login($user);

            return redirect()->route('profile.show')->with('success', 'تم تسجيل الدخول عبر Facebook بنجاح');
        } catch (Exception $e) {
            \Log::error('Facebook Callback Error: ' . $e->getMessage());
            return redirect()->route('login')->with('error', 'فشل تسجيل الدخول عبر Facebook. يرجى المحاولة مرة أخرى.');
        }
    }
}
