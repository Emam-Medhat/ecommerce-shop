<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class ProfileController extends Controller
{

public function index()
    {
        $users = User::all(); // أو أي منطق آخر لجلب المستخدمين
        return view('profile.index', compact('users'));
    }

    // عرض الملف الشخصي (View Only)
    public function show()
    {
        $user = Auth::user();
        return view('profile.show', compact('user'));
    }

    // صفحة تعديل الملف الشخصي
    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    // تحديث البيانات
    public function update(Request $request)
    {
        $user = Auth::user();

        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'phone' => 'required|string|max:20',               // اجبارى
            'address' => 'required|string|max:255',           // اجبارى
            'profile_picture' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // اجبارى
            'password' => 'nullable|string|min:8|confirmed',  // اختيارى
        ]);

        // رفع الصورة الشخصية
        if ($request->hasFile('profile_picture')) {
            $validatedData['profile_picture'] = $request->file('profile_picture')->store('profile_pictures', 'public');
        }

        // تغيير كلمة المرور لو المستخدم دخلها
        if (!empty($validatedData['password'])) {
            $validatedData['password'] = Hash::make($validatedData['password']);
        } else {
            unset($validatedData['password']);
        }

        $user->update($validatedData);

        return redirect()->route('profile.show')->with('success', 'تم تحديث الملف الشخصي بنجاح!');
    }
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect()->route('profile.index')->with('success', 'تم حذف المستخدم بنجاح!');
    }


}
