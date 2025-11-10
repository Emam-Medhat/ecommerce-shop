<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth; // أضفت ده عشان auth()
use Illuminate\Validation\ValidationException; // اختياري للأخطاء

class LoginController extends Controller
{
    // عرض صفحة الدخول
    public function create()
    {
        return view('auth.login');
    }

    // معالجة تسجيل الدخول
    public function store(Request $request)
    {
        // Validate the incoming request data
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // **أضف هنا دمج السلة من Session إلى DB عشان تحفظ بعد الدخول**
            $this->mergeCartToUser(Auth::id());

            // Redirect based on user role
            // if (Auth::user()->role === 'admin') {
            //     return redirect()->intended('/admin/dashboard');
            // } else {
            //     return redirect()->intended('/user/dashboard');
            // }
            return redirect()->intended('/');
        }

        // Authentication failed
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    // تسجيل الخروج (السلة محفوظة في DB، مش هتتمسح)
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');
    }

    // عرض الملف الشخصي
    public function profile()
    {
        return view('auth.profile');
    }

    // **دالة دمج السلة (من Session إلى DB) عند الدخول**
    private function mergeCartToUser($userId)
    {
        $guestCart = Session::get('cart', []);
        foreach ($guestCart as $productId => $item) {
            // تحقق من المنتج
            $product = \App\Models\Product::find($productId);
            if ($product) {
                \App\Models\Cart::updateOrCreate(
                    ['user_id' => $userId, 'product_id' => $productId],
                    [
                        'quantity' => $item['qty'],
                        'price' => $item['price']
                    ]
                );
            }
        }
        Session::forget('cart'); // امسح الـ guest cart بعد الدمج
    }
}