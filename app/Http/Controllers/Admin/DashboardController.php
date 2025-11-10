<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        // جلب البيانات من قاعدة البيانات
        $productsCount = Product::count();
        $usersCount = User::where('role', 'user')->count();
        $adminsCount = User::where('role', 'admin')->count();
        $sellercount = User::where('role', 'seller')->count();

        $customersCount = User::count();

        // تمرير البيانات للـ View
        return view('admin.dashboard', compact('productsCount', 'usersCount', 'adminsCount', 'sellercount'));
    }
}
