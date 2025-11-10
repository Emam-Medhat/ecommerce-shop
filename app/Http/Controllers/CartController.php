<?php

namespace App\Http\Controllers;

use Log;
use App\Models\Cart;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\Cart as CartModel; // استخدم الاسم ده عشان متتداخلش مع Session cart

class CartController extends Controller
{
    // دالة مساعدة لدمج السلة من DB مع Session
    private function mergeCartFromDB()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $dbCart = CartModel::where('user_id', $userId)->get();
            $sessionCart = Session::get('cart', []);

            foreach ($dbCart as $item) {
                $productId = $item->product_id;
                if (!isset($sessionCart[$productId])) {
                    $product = Product::find($productId);
                    if ($product) {
                        $sessionCart[$productId] = [
                            'id' => $productId,
                            'name' => $product->name,
                            'price' => $item->price,
                            'qty' => $item->quantity,
                            'total' => $item->quantity * $item->price,
                            'image' => $product->image
                        ];
                    }
                }
            }
            Session::put('cart', $sessionCart);
        }
    }

    // دالة مساعدة لحفظ السلة في DB
    private function saveCartToDB()
    {
        if (Auth::check()) {
            $userId = Auth::id();
            $sessionCart = Session::get('cart', []);

            // امسح السلة القديمة من DB
            CartModel::where('user_id', $userId)->delete();

            // أضف الجديدة
            foreach ($sessionCart as $item) {
                CartModel::create([
                    'user_id' => $userId,
                    'product_id' => $item['id'],
                    'quantity' => $item['qty'],
                    'price' => $item['price']
                ]);
            }
        }
    }
public function index()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'من فضلك سجل الدخول أولاً');
    }

    $userId = auth()->id();

    // نجيب كل العناصر في السلة مع المنتج المرتبط
    $cartItems = \App\Models\Cart::where('user_id', $userId)
        ->with('product')
        ->get();

    // نحسب الإجمالي باستخدام foreach بدل session
    $total = 0;
    foreach ($cartItems as $item) {
        $total += $item->price * $item->quantity;
    }

    return view('cart', compact('cartItems', 'total'));
}


public function add(Request $request)
{
    // التحقق من تسجيل الدخول
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'سجل الدخول لإضافة المنتجات إلى السلة');
    }

    $userId = auth()->id();
    $productId = $request->product_id;
    $qty = $request->qty ?? 1;

    // جلب المنتج من قاعدة البيانات
    $product = \App\Models\Product::findOrFail($productId);

    // تحديد رابط الصورة الصحيح
    $image = Str::startsWith($product->image, ['http://','https://'])
             ? $product->image
             : asset('storage/' . $product->image);

    // تحقق إذا المنتج موجود مسبقًا في السلة
    $cartItem = \App\Models\Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->first();

    if ($cartItem) {
        // تحديث الكمية فقط إذا موجود مسبقًا
        $cartItem->quantity += $qty;
        $cartItem->save();
    } else {
        // إضافة منتج جديد
        \App\Models\Cart::create([
            'user_id' => $userId,
            'product_id' => $productId,
            'quantity' => $qty,
            'price' => $product->price,
            'image' => $image
        ]);
    }

    return back()->with('success', 'تمت إضافة المنتج إلى السلة بنجاح!');
}


    // إضافة منتج
// public function add(Request $request)
// {
//     if (!auth()->check()) {
//         return redirect()->route('login')->with('error', 'سجل الدخول لإضافة المنتجات إلى السلة');
//     }

//     $userId = auth()->id();
//     $productId = $request->product_id;
//     $qty = $request->qty ?? 1;

//     $product = \App\Models\Product::findOrFail($productId);

//     // لو المنتج موجود بالفعل، نحدث الكمية فقط
//     $cartItem = \App\Models\Cart::where('user_id', $userId)
//         ->where('product_id', $productId)
//         ->first();

//     if ($cartItem) {
//         // زود الكمية فقط
//         $cartItem->quantity += $qty;
//         $cartItem->save();
//     } else {
//         // أضف منتج جديد
//         \App\Models\Cart::create([
//             'user_id' => $userId,
//             'product_id' => $productId,
//             'quantity' => $qty,
//             'price' => $product->price
//         ]);
//     }

//     return back()->with('success', 'تمت إضافة المنتج إلى السلة');
// }



    // حذف منتج
public function remove($productId)
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'سجل الدخول أولاً');
    }

    $userId = auth()->id();

    // حذف المنتج من قاعدة البيانات
    \App\Models\Cart::where('user_id', $userId)
        ->where('product_id', $productId)
        ->delete();

    return redirect()->route('cart.index')->with('success', 'تم حذف المنتج بنجاح!');
}


    // تحديث كمية
    public function update(Request $request, $id)
    {
        $qty = intval($request->input('qty'));
        $cart = Session::get('cart', []);
        if (isset($cart[$id]) && $qty > 0) {
            $cart[$id]['qty'] = $qty;
            $cart[$id]['total'] = $cart[$id]['qty'] * $cart[$id]['price'];
            Session::put('cart', $cart);
            $this->saveCartToDB(); // حفظ في DB
        } elseif ($qty <= 0) {
            unset($cart[$id]);
            Session::put('cart', $cart);
            $this->saveCartToDB(); // حفظ في DB
        }
        return redirect()->route('cart.index')->with('success', 'تم تحديث السلة!');
    }

    // تفريغ السلة
public function clear()
{
    if (!auth()->check()) {
        return redirect()->route('login')->with('error', 'سجل الدخول أولاً');
    }

    $userId = auth()->id();

    // حذف جميع العناصر من قاعدة البيانات
    \App\Models\Cart::where('user_id', $userId)->delete();

    return redirect()->route('cart.index')->with('success', 'تم تفريغ السلة بنجاح!');
}

}
