<x-navbar title="products_seller">
<div class="container mt-5">
    <h2 class="mb-4">مراجعة المنتجات المضافة من البائعين</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>الصورة</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
                <th>البائع</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    
                    <td><img src="{{ asset('storage/' . $product->image) }}" width="70"></td>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->price }} جنيه</td>
                    <td>{{ $product->user->name }}</td>
                    <td>{{ $product->user->role }}</td>
                    <td>
                        @if($product->status == 'pending')
                            <span class="badge bg-warning text-dark">قيد المراجعة</span>
                        @elseif($product->status == 'approved')
                            <span class="badge bg-success">تم النشر</span>
                        @else
                            <span class="badge bg-danger">مرفوض</span>
                        @endif
                    </td>
                    <td>
                        @if($product->status == 'pending')
                            <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">موافقة</button>
                            </form>
                            <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-danger btn-sm">رفض</button>
                            </form>
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-navbar>
