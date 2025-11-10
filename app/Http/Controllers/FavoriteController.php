<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Favorite;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class FavoriteController extends Controller
{
    public function index()
    {
        $favorites = Favorite::where('user_id', Auth::id())
            ->with('product')
            ->get();

        return view('products.favorites', compact('favorites'));
    }

    public function clearAll()
{
    $userId = Auth::id();

    Favorite::where('user_id', $userId)->delete();

    if (request()->expectsJson()) {
        return response()->json(['status' => 'cleared']);
    }

    return back()->with('success', 'تم حذف جميع المنتجات المفضلة بنجاح 🗑️');
}


    public function add($productId)
    {
        $userId = Auth::id();
        $product = Product::findOrFail($productId);

        $exists = Favorite::where('user_id', $userId)
            ->where('product_id', $productId)
            ->exists();

        if (!$exists) {
            Favorite::create([
                'user_id' => $userId,
                'product_id' => $productId,
            ]);
        }

        if (request()->expectsJson()) {
            $count = Favorite::where('user_id', $userId)->count();
            return response()->json(['status' => 'added', 'count' => $count]);
        }

        return back()->with('success', 'تمت إضافة المنتج إلى المفضلة بنجاح ❤️');
    }

    public function remove($productId)
    {
        $userId = Auth::id();
        $favorite = Favorite::where('user_id', $userId)
            ->where('product_id', $productId)
            ->first();

        if ($favorite) {
            $favorite->delete();
        }

        if (request()->expectsJson()) {
            $count = Favorite::where('user_id', $userId)->count();
            return response()->json(['status' => 'removed', 'count' => $count]);
        }

        return back()->with('success', 'تمت إزالة المنتج من المفضلة.');
    }
}
