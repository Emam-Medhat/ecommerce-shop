<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'role' => 'required|in:user,admin,seller', // تحديد الدور بشكل إجباري
        ]);

        // رفع الصورة
        $profilePicture = $request->file('profile_picture')->store('profile_pictures', 'public');

        // إنشاء المستخدم
        $user = User::create([
            'name' => $validatedData['name'],
            'email' => $validatedData['email'],
            // 'password' => Hash::make($validatedData['password']),
            'password' => $validatedData['password'],
            'profile_picture' => $profilePicture,
            'phone' => $validatedData['phone'],
            'address' => $validatedData['address'],
            'role' => $validatedData['role'], // يحدد هل يوزر أو أدمن
        ]);

        // auth()->login($user);

        // تحويل حسب الدور
      

        return redirect()->route('login');
    }
}
