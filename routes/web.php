<?php

use App\Jobs\TestJob;


use App\Livewire\Chat;
use App\Events\MessageSent;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\ChatController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\TestController;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Broadcast;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\Auth\OtpController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\admin\UserController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\GitHubController;
use App\Http\Controllers\Auth\GoogleController;
use App\Http\Controllers\AdminProductController;
use App\Http\Controllers\Auth\ProfileController;
use App\Http\Controllers\Auth\TwitterController;
use App\Http\Controllers\Auth\FacebookController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\admin\DashboardController;


Route::get('test',function (){
    return view('test');
});



Route::get('/auth/facebook', [FacebookController::class, 'redirectToFacebook'])->name('facebook.login');
Route::get('/auth/facebook/callback', [FacebookController::class, 'handleFacebookCallback']);


Route::get('/auth/github', [GitHubController::class, 'redirectToGitHub'])->name('github.login');
Route::get('/auth/github/callback', [GitHubController::class, 'handleGitHubCallback']);




Route::get('/auth/twitter', [TwitterController::class, 'redirectToTwitter'])->name('twitter.login');
Route::get('/auth/twitter/callback', [TwitterController::class, 'handleTwitterCallback']);


// google
Route::middleware('guest')->group(function () {
    Route::get('auth/google', [GoogleController::class, 'redirectToGoogle'])->name('google.login');
    Route::get('auth/google/callback', [GoogleController::class, 'handleGoogleCallback']);
});

// Chat Routes

Route::middleware('auth')->group(function () {
    Route::post('/api/chat/send', [ChatController::class, 'sendMessage']);
    Route::get('/api/chat/users', [ChatController::class, 'getUsers']);
    Route::get('/api/chat/conversation/{userId}', [ChatController::class, 'getConversation']);
    Route::post('/api/chat/mark-read/{userId}', [ChatController::class, 'markAsRead']);
    Route::get('/api/chat/unread-count', [ChatController::class, 'getUnreadCount']);
    Route::get('/chat', [PageController::class, 'chat'])->name('chat.index');
    Route::get('/chat/{userId}', [PageController::class, 'chatWithUser'])->name('chat.user');

});


Route::get('/',[TestController::class,'home'])->name('home');


Route::group(['middleware' => 'auth'], function () {

// Route::get('nav', function () {
//     return view('component.navbar');
// });
Route::get('nav',[TestController::class,'index']);


Route::get('help',function(){
    return view('support.help');
})->name('help');

Route::get('suport', function () {
    return view('support.suport');
})->name('support');

Route::get('/contact', function () {
    return view('contact');
})->name('contact');

Route::get('/signal', function () {
    return view('single');
})->name('signal');

Route::get('shop',[ProductController::class, 'index'])->name('shop');

Route::get('/single/{id}', [ProductController::class, 'show'])->name('single');

Route::get('error', function () {
    return view('error');
})->name('error');

Route::get('bestseller', function () {
    return view('bestseller');
})->name('bestseller');

});





//  لوحة الإدارة (admin panel)
Route::prefix('admin')->middleware('is_admin','auth')->name('admin.')->group(function () {
    // عرض كل الرسائل
    Route::get('/contacts/index', [ContactController::class, 'index'])->name('contacts.index');

    // عرض رسالة معينة
    Route::get('/contacts/show/{id}', [ContactController::class, 'show'])->name('contacts.show');

    // حذف رسالة
    Route::delete('/contacts/{id}', [ContactController::class, 'destroy'])->name('contacts.destroy');
});




Route::middleware(['auth'])->group(function () {

    Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
// Route::get('/categories/{id}/sub', [CategoryController::class, 'getSubCategories']);
// Route::get('/subcategories/{parent_id}', [CategoryController::class, 'getSubcategories']);


Route::get('/categories/{id}/products', [ProductController::class, 'productsByCategory'])
    ->name('categories.products');

Route::get('/categories/{id}/subcategories', [CategoryController::class, 'getSubCategories'])
    ->name('categories.subcategories');

// Routes للسلة
Route::get('/cart', [CartController::class, 'index'])->name('cart.index');
Route::post('/cart/add', [CartController::class, 'add'])->name('cart.add');
Route::delete('/cart/{id}', [CartController::class, 'remove'])->name('cart.remove');
Route::post('/cart/{id}/update', [CartController::class, 'update'])->name('cart.update');
Route::delete('/cart/clear', [CartController::class, 'clear'])->name('cart.clear');

// Checkout (مثال، أنشئ Controller لو عايز)
Route::get('/checkout', function() { return view('cheackout'); })->name('checkout');

Route::get('/contact', [ContactController::class, 'create'])->name('contact.create')->middleware('auth');

// حفظ رسالة المستخدم
Route::post('/contact/insert', [ContactController::class, 'store'])->name('contact.store');
Route::get('/search', [ProductController::class, 'search'])->name('products.search');

Route::get('/products', [ProductController::class, 'index'])->name('products.index');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('products.show');


});



// (Authentication)
Route::get('login',[LoginController::class,'create'])->name('login');
Route::post('login/insert',[LoginController::class,'store'])->name('login.store');
Route::get('register',[RegisterController::class,'create'])->name('register');
Route::post('register/insert',[RegisterController::class,'store'])->name('register.store');
Route::get('logout',[LoginController::class,'logout'])->name('logout');


Route::middleware('auth')->group(function () {
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/profile/show', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('profile/all', [ProfileController::class, 'index'])->name('profile.index')->middleware('is_admin');
    Route::delete('profile/{id}', [ProfileController::class, 'destroy'])->name('profile.destroy')->middleware('is_admin');
});


Route::middleware('auth')->group(function () {
    Route::get('/favorites', [FavoriteController::class, 'index'])->name('favorites.index');
    Route::post('/favorites/{product}', [FavoriteController::class, 'add'])->name('favorites.add');
    Route::delete('/favorites/{product}', [FavoriteController::class, 'remove'])->name('favorites.remove');
    Route::delete('/favorites/clear', [FavoriteController::class, 'clearAll'])->name('favorites.clear');

});

// منتجات للـ Admin (CRUD)
Route::middleware(['auth', 'admin_or_seller'])->group(function () {
    Route::get('/admin/products', [ProductController::class, 'adminIndex'])->name('admin.products.index');
    Route::get('/admin/products/create', [ProductController::class, 'create'])->name('products.create')->middleware(['auth']);
    Route::post('/admin/products', [ProductController::class, 'store'])->name('products.store')->middleware(['auth']);
    Route::get('/admin/products/{id}/edit', [ProductController::class, 'edit'])->name('products.edit')->middleware(['auth']);
    Route::put('/admin/products/{id}', [ProductController::class, 'update'])->name('products.update')->middleware(['auth']);
    Route::delete('/admin/products/{id}', [ProductController::class, 'destroy'])->name('products.destroy')->middleware(['auth']);
});

Route::get('/subcategories/create', [CategoryController::class, 'createSub'])->name('subcategories.create')->middleware(['auth', 'is_admin']);
Route::post('/subcategories', [CategoryController::class, 'storeSub'])->name('subcategories.store')->middleware(['auth', 'is_admin']);
Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index')->middleware(['auth', 'is_admin']);
Route::get('/categories/create', [CategoryController::class, 'create'])->name('categories.create')->middleware(['auth', 'is_admin']);
Route::post('/categories', [CategoryController::class, 'store'])->name('categories.store')->middleware(['auth', 'is_admin']);
Route::get('/categories/{category}/edit', [CategoryController::class, 'edit'])->name('categories.edit')->middleware(['auth', 'is_admin']);
Route::put('/categories/{category}', [CategoryController::class, 'update'])->name('categories.update')->middleware(['auth', 'is_admin']);
Route::delete('/categories/{category}', [CategoryController::class, 'destroy'])->name('categories.destroy')->middleware(['auth', 'is_admin']);

Route::middleware(['auth', 'is_admin'])->prefix('admin')->group(function () {
    Route::get('/products/seller', [AdminProductController::class, 'index'])->name('admin.products.index');
    Route::get('/products/pending', [AdminProductController::class, 'pending'])->name('admin.products.pending');
    Route::post('/products/{id}/approve', [AdminProductController::class, 'approve'])->name('admin.products.approve');
    Route::post('/products/{id}/reject', [AdminProductController::class, 'reject'])->name('admin.products.reject');
    Route::delete('/products/seller/{id}', [AdminProductController::class, 'destroy'])->name('admin.products.destroy');
    Route::post('/products/approve-all', [AdminProductController::class, 'approveAll'])->name('admin.products.approveAll');
    Route::post('/products/reject-all', [AdminProductController::class, 'rejectAll'])->name('admin.products.rejectAll');
    Route::post('/products/bulk-action', [AdminProductController::class, 'bulkAction'])->name('admin.products.bulkAction');
});


// مجموعة Routes للـ Admin
Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // تقدر تضيف روابط إضافية لكل الأقسام
    Route::get('/products', [ProductController::class, 'index'])->name('products.index');
    Route::get('/customers', [UserController::class, 'index'])->name('customers.index');
});
