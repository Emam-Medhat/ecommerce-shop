<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class AdminProductController extends Controller
{
    /**
     * عرض كل المنتجات (المقبولة + المعلقة + المرفوضة)
     */
    public function index()
    {
        $products = Product::with('category', 'user')->latest()->get();
        return view('products.products_seller', compact('products'));
    }

    /**
     * عرض المنتجات المعلقة فقط في انتظار المراجعة
     */


public function approveAll()
{
    // تحديث حالة جميع المنتجات المعلقة إلى "مقبولة"
    Product::where('status', 'pending')->update(['status' => 'approved']);

    return redirect()->back()->with('success', '✅ تمت الموافقة على جميع المنتجات المعلقة بنجاح');
}

public function bulkAction(Request $request)
{
    $request->validate([
        'selected_products' => 'required|array',
        'action' => 'required|string|in:approve,reject',
    ]);

    $status = $request->action === 'approve' ? 'approved' : 'rejected';

    Product::whereIn('id', $request->selected_products)->update(['status' => $status]);

    $msg = $request->action === 'approve' 
            ? '✅ تم موافقة المنتجات المحددة بنجاح' 
            : '❌ تم رفض المنتجات المحددة بنجاح';

    return redirect()->back()->with('success', $msg);
}


    public function pending()
    {
        $pendingProducts = Product::with('category', 'user')
            ->where('status', 'pending')
            ->latest()
            ->get();

        return view('products.pending', compact('pendingProducts'));
    }

    /**
 * رفض كل المنتجات المعلقة دفعة واحدة
 */
public function rejectAll()
{
    Product::where('status', 'pending')->update(['status' => 'rejected']);

    return redirect()->back()->with('error', '❌ تم رفض جميع المنتجات المعلقة بنجاح');
}

    /**
     * موافقة الأدمن على المنتج
     */
    public function approve($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'approved']);

        return redirect()->back()->with('success', '✅ تمت الموافقة على المنتج بنجاح');
    }

    /**
     * رفض المنتج
     */
    public function reject($id)
    {
        $product = Product::findOrFail($id);
        $product->update(['status' => 'rejected']);

        return redirect()->back()->with('error', '❌ تم رفض المنتج');
    }

    /**
     * حذف المنتج نهائيًا (اختياري)
     */
    public function destroy($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->back()->with('success', '🗑️ تم حذف المنتج بنجاح');
    }
}
