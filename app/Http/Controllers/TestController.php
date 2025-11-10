<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Category;
use App\Models\Product;

class TestController extends Controller
{
    public function index()
    {
        // جلب الأقسام الرئيسية مع الفرعية
        $categories = Category::whereNull('parent_id')
                        ->with('children')
                        ->get();

        // جلب المنتجات المفضلة (بدون ربط بالمستخدم)
        $favorites = Product::where('favorite', true)->get();

        // عرض الصفحة (مثلاً صفحة رئيسية)
        return view('home', compact('categories', 'favorites'));
    }

    public function home()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
}
