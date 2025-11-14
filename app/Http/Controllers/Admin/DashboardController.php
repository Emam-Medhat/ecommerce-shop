<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Order; // افترض model Order
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    // public function index()
    // {
    //     // جلب البيانات من قاعدة البيانات
    //     $productsCount = Product::count();
    //     $usersCount = User::where('role', 'user')->count();
    //     $adminsCount = User::where('role', 'admin')->count();
    //     $sellercount = User::where('role', 'seller')->count();

    //     $customersCount = User::count();

    //     // تمرير البيانات للـ View
    //     return view('admin.dashboard', compact('productsCount', 'usersCount', 'adminsCount', 'sellercount'));
    // }
   public function index()
    {
        // إحصائيات كبيرة (بدون orders)
        $stats = [
            'total_products' => Product::count(),
            'total_users' => User::count(),
            'total_categories' => Category::count(),
            'pending_products' => Product::where('status', 'pending')->count(),
            'approved_products' => Product::where('status', 'approved')->count(),
            'total_subcategories' => Category::whereNotNull('parent_id')->count(), // افترض إن subcategories ليها parent_id
        ];
$admin = Auth::user();
        // Recent Items (آخر 10) – بدون orders
        $recent_products = Product::with('category')->latest()->take(10)->get();
        $recent_users = User::latest()->take(10)->get();
        $recent_categories = Category::latest()->take(10)->get();

        // Chart Data: إضافات المنتجات الشهرية (بدل المبيعات)
        $monthly_additions = Product::select(DB::raw('DATE_FORMAT(created_at, "%Y-%m") as month'), DB::raw('COUNT(*) as count'))
            ->whereYear('created_at', now()->year)
            ->groupBy('month')
            ->orderBy('month')
            ->pluck('count', 'month')
            ->toArray();

        $category_distribution = Category::withCount('products')->get()->pluck('products_count', 'name')->toArray();

        // توزيع المنتجات حسب الحالة (بدل order status)
        $product_status = Product::select('status', DB::raw('COUNT(*) as count'))
            ->groupBy('status')
            ->pluck('count', 'status')
            ->toArray();

        return view('components.dashboard', compact(
            'stats', 'recent_products', 'recent_users', 'recent_categories',
            'monthly_additions', 'category_distribution', 'product_status', 'admin'
        ));
    }
}
