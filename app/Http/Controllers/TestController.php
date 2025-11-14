<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;

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
        $mainCategories = ['Electronics', 'Home Appliances', 'Books', 'Games'];
        
        // جلب الفئات الرئيسية مع الفرعيات (recursive load)
        $categories = Category::whereIn('name', $mainCategories)
            ->with(['products', 'children.products', 'children.children.products']) // load أساسي لعمق 2، والrecursive هيكمل
            ->get();

        // دالة recursive لجمع كل المنتجات من كل المستويات
        $collectAllProducts = function ($node, Collection &$allProducts) use (&$collectAllProducts) {
            // إضافة المنتجات المباشرة
            if ($node->relationLoaded('products') && $node->products) {
                $allProducts = $allProducts->merge($node->products);
            }
            
            // تكرار للفرعيات (أي عمق)
            if ($node->relationLoaded('children') && $node->children) {
                foreach ($node->children as $child) {
                    $collectAllProducts($child, $allProducts);
                }
            }
        };

        // تطبيق على كل فئة رئيسية
        $categories->each(function ($category) use ($collectAllProducts) {
            $allProducts = new Collection();
            $collectAllProducts($category, $allProducts);
            
            // فلترة التكرار وترتيب (اختياري: limit 20 للعرض، امسح لو عايز كلها)
            $category->setRelation('products', $allProducts->unique('id')->sortBy('created_at')->take(20)->values());
        });

        return view('index', compact('categories'));
    }
}
