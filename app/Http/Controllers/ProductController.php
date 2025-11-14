<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\ProductAttribute;

class ProductController extends Controller
{


public function search(Request $request)
{
    $query = $request->input('q');
    $category = $request->input('category');

    $products = Product::query();

    if ($query) {
        $products->where('name', 'LIKE', "%{$query}%");
    }

    if ($category) {
        $products->where('category_id', $category);
    }

    $results = $products->get();

    return view('products.search', compact('results', 'query'));
}


public function toggleFavorite($id)
{
    $product = \App\Models\Product::findOrFail($id);
    $user = auth()->user();

    if (!$user) {
        return response()->json(['error' => 'يجب تسجيل الدخول أولاً'], 401);
    }

    $favorite = \App\Models\Favorite::where('user_id', $user->id)
        ->where('product_id', $product->id)
        ->first();

    if ($favorite) {
        $favorite->delete();
        $isFavorite = false;
    } else {
        \App\Models\Favorite::create([
            'user_id' => $user->id,
            'product_id' => $product->id,
        ]);
        $isFavorite = true;
    }

    return response()->json(['favorite' => $isFavorite]);
}




public function index(Request $request)
{
    $categoryId = $request->get('category');
    $maxPrice = $request->get('max_price'); // القيمة اللي جايه من slider

    $categories = Category::whereNull('parent_id')
        ->with(['children' => function($query) {
            $query->withCount(['products' => function($q) {
                $q->where('status', 'approved');
            }]);
        }])
        ->withCount(['products' => function ($query) {
            $query->where('status', 'approved');
        }])
        ->get();

    $products = Product::with('attributes')
        ->when($categoryId, function($query, $categoryId) {
            $query->where('category_id', $categoryId)
                  ->orWhereHas('category', function($q) use ($categoryId) {
                      $q->where('parent_id', $categoryId);
                  });
        })
        ->when($maxPrice, function($query, $maxPrice) {
            $query->where('discount_price', '<=', $maxPrice);
        })
        ->where('status', 'approved')
        ->paginate(15); // عرض 30 منتج لكل صفحة - غير الرقم حسب احتياجك

    return view('shop', compact('products', 'categories', 'categoryId', 'maxPrice'));
}

// public function index(Request $request)
// {
//     $categoryId = $request->get('category');
//     $maxPrice = $request->get('max_price'); // القيمة اللي جايه من slider

//     $categories = Category::whereNull('parent_id')
//         ->with(['children' => function($query) {
//             $query->withCount(['products' => function($q) {
//                 $q->where('status', 'approved');
//             }]);
//         }])
//         ->withCount(['products' => function ($query) {
//             $query->where('status', 'approved');
//         }])
//         ->get();

//     $products = Product::with('attributes')
//         ->when($categoryId, function($query, $categoryId) {
//             $query->where('category_id', $categoryId)
//                   ->orWhereHas('category', function($q) use ($categoryId) {
//                       $q->where('parent_id', $categoryId);
//                   });
//         })
//         ->when($maxPrice, function($query, $maxPrice) {
//             $query->where('discount_price', '<=', $maxPrice);
//         })
//         ->where('status', 'approved')
//         ->paginate(30); // عرض 30 منتج لكل صفحة - غير الرقم حسب احتياجك

//     return view('shop', compact('products', 'categories', 'categoryId', 'maxPrice'));
// }


public function create()
{
    $mainCategories = Category::whereNull('parent_id')->get();
    return view('products.create', compact('mainCategories'));
}



public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'price' => 'required|numeric',
        'discount_price' => 'nullable|numeric',
        'description' => 'nullable|string',
        'image' => 'nullable|image|max:2048',
        'attributes.*.name' => 'required|string',
        'attributes.*.value' => 'required|string',
        'condition' => 'required|in:new,used',

    ]);

    // رفع الصورة إن وُجدت
    if ($request->hasFile('image')) {
        $validated['image'] = $request->file('image')->store('products', 'public');
    }

    // ✅ إنشاء المنتج مرة واحدة فقط
    $product = Product::create([
        'name' => $validated['name'],
        'category_id' => $validated['category_id'],
        'description' => $validated['description'] ?? null,
        'price' => $validated['price'],
        'discount_price' => $validated['discount_price'] ?? null,
        'condition' => $validated['condition'],
        'image' => $validated['image'] ?? null,
        'user_id' => auth()->id(),
         'favorite' => false,
        'status' => 'pending', // المنتج في انتظار المراجعة
    ]);

    // إضافة الخصائص
    if ($request->filled('attributes')) {
        foreach ($request->input('attributes') as $attr) {
            if (!empty($attr['name']) && !empty($attr['value'])) {
                ProductAttribute::create([
                    'product_id' => $product->id,
                    'name' => $attr['name'],
                    'value' => $attr['value'],
                ]);
            }
        }
    }

    return redirect()->route('shop')->with('success', 'تم إرسال المنتج بنجاح بانتظار موافقة الأدمن.');
}

public function show($id)
{
        $items = Product::with('attributes')->get();


    $product = Product::with('attributes')->findOrFail($id);
    return view('products.single', compact('product', 'items'));
}

   public function edit($id)
{
    $product = Product::with('attributes')->findOrFail($id);
       $mainCategories = Category::whereNull('parent_id')->get();

    return view('products.edit', compact('product', 'mainCategories'));
}


    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price' => 'required|numeric',
            'discount_price' => 'nullable|numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|max:2048',
            'attributes.*.name' => 'required|string',
            'attributes.*.value' => 'required|string',
            'condition' => 'required|in:new,used',
        ]);

        if ($request->hasFile('image')) {
            $validated['image'] = $request->file('image')->store('products', 'public');
        }

        $product->update($validated);

        // تحديث الخصائص
        $product->attributes()->delete();
        if ($request->has('attributes')) {
            foreach ($request->attributes as $attr) {
                $product->attributes()->create($attr);
            }
        }

    return redirect()->route('admin.products.index')->with('success', 'تم تحديث المنتج بنجاح!');

    }

    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->attributes()->delete();
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'تم حذف المنتج بنجاح!');
    }




}
