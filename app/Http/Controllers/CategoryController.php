<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class CategoryController extends Controller
{
public function show($slug)
{
    $category = Category::where('slug', $slug)->firstOrFail();

    $products = Product::where('category_id', $category->id)
                       ->with('attributes')
                       ->latest()
                       ->get();

    return view('products.show', compact('category', 'products'));
}



public function getSubCategories($id)
{
    $subCategories = \App\Models\Category::where('parent_id', $id)->get();
    return response()->json($subCategories);
}



public function productsByCategory($id)
{
    // جلب القسم الفرعي الحالي
    $category = \App\Models\Category::findOrFail($id);

    // جلب المنتجات اللي تنتمي للقسم ده
    $products = \App\Models\Product::where('category_id', $id)->get();

    return view('products.by_category', compact('products', 'category'));
}

  public function index()
    {
        $categories = Category::with('children')->get(); // children للفرعية
        return view('categories.index', compact('categories'));
    }

        public function createSub()
    {
        // جلب الأقسام الرئيسية فقط
        $mainCategories = Category::whereNull('parent_id')->get();
        return view('categories.create_sub', compact('mainCategories'));
    }

    // حفظ القسم الفرعي
    public function storeSub(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'required|exists:categories,id', // لازم تختار قسم رئيسي
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id,
        ]);

        return redirect()->back()->with('success', 'Subcategory added successfully!');
    }

    // صفحة إضافة قسم
  public function create()
    {
        return view('categories.create');
    }

    // حفظ القسم الرئيسي
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => null, // دائمًا رئيسي
        ]);

        return redirect()->back()->with('success', 'Main category added successfully!');
    }



    // صفحة تعديل
    public function edit(Category $category)
    {
        $parents = Category::whereNull('parent_id')->where('id', '!=', $category->id)->get();
        return view('categories.edit', compact('category', 'parents'));
    }

    // تحديث قسم
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'parent_id' => 'nullable|exists:categories,id',
        ]);

        $category->update([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
            'parent_id' => $request->parent_id
        ]);

        return redirect()->route('categories.index')->with('success', 'Category updated successfully!');
    }

    // حذف قسم
    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully!');
    }
}
