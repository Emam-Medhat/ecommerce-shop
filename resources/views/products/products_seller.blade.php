<x-app>
    <x-dashboard>
<div class="container mt-5">
    <h2 class="mb-4">مراجعة المنتجات المضافة من البائعين</h2>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- أزرار التحكم الجماعي -->
    <div class="mb-3 d-flex gap-2">
        <button type="button" id="approveSelected" class="btn btn-success">
            ✅ موافقة على المنتجات المحددة
        </button>

        <button type="button" id="deleteSelected" class="btn btn-danger">
            🗑️ حذف المنتجات المحددة
        </button>
    </div>

    <table class="table table-bordered table-striped align-middle text-center">
        <thead>
            <tr>
                <th><input type="checkbox" id="selectAll"></th>
                <th>الصورة</th>
                <th>اسم المنتج</th>
                <th>السعر</th>
                <th>البائع</th>
                <th>اسم الناشر</th>
                <th>الحالة</th>
                <th>الإجراءات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
                <tr>
                    <td><input type="checkbox" class="productCheckbox" value="{{ $product->id }}"></td>

                    <td>
                        <img src="{{ Str::startsWith($product->image, ['http://', 'https://'])
                            ? $product->image
                            : asset('storage/' . $product->image) }}"
                            width="70" height="70" class="rounded">
                    </td>

                    <td>{{ $product->name ?? 'غير معروف' }}</td>
                    <td>{{ $product->price }} جنيه</td>
                    <td>{{ $product->user->role }}</td>
                    <td>{{ $product->user->name ?? 'غير معروف' }}</td>

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
                        {{-- موافقة ورفض فردي --}}
                        @if($product->status == 'pending')
                            <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-success btn-sm">موافقة</button>
                            </form>
                            <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="d-inline">
                                @csrf
                                <button class="btn btn-warning btn-sm">رفض</button>
                            </form>
                        @endif

                        {{-- تعديل --}}
                        <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary btn-sm">تعديل</a>

                        {{-- حذف فردي --}}
                        <form action="{{ route('products.destroy', $product->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger btn-sm"
                                onclick="return confirm('هل أنت متأكد من حذف هذا المنتج؟')">
                                حذف
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

<!-- سكربت لتحديد الكل + الموافقة والحذف الجماعي -->
<script>
    // تحديد الكل
    document.getElementById('selectAll').addEventListener('click', function() {
        const checkboxes = document.querySelectorAll('.productCheckbox');
        checkboxes.forEach(cb => cb.checked = this.checked);
    });

    // حذف جماعي
    document.getElementById('deleteSelected').addEventListener('click', function() {
        const selected = Array.from(document.querySelectorAll('.productCheckbox:checked')).map(cb => cb.value);

        if (selected.length === 0) {
            alert('الرجاء تحديد منتج واحد على الأقل للحذف.');
            return;
        }

        if (!confirm('هل أنت متأكد من حذف المنتجات المحددة؟')) {
            return;
        }

        // إرسال طلب DELETE لكل منتج
        selected.forEach(id => {
            fetch(`/admin/products/${id}`, {
                method: 'DELETE',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                if (!response.ok) {
                    console.error(`فشل حذف المنتج رقم ${id}`);
                }
            });
        });

        // إعادة تحميل الصفحة بعد ثانية
        setTimeout(() => location.reload(), 1000);
    });

    // موافقة جماعية (نفس فكرة الحذف)
    document.getElementById('approveSelected').addEventListener('click', function() {
        const selected = Array.from(document.querySelectorAll('.productCheckbox:checked')).map(cb => cb.value);

        if (selected.length === 0) {
            alert('الرجاء تحديد منتج واحد على الأقل للموافقة.');
            return;
        }

        if (!confirm('هل أنت متأكد من الموافقة على المنتجات المحددة؟')) {
            return;
        }

        // إرسال طلب POST على نفس راوت الموافقة الفردي
        selected.forEach(id => {
            fetch(`/admin/products/${id}/approve`, {
                method: 'POST',
                headers: {
                    'X-CSRF-TOKEN': '{{ csrf_token() }}',
                    'Accept': 'application/json',
                }
            })
            .then(response => {
                if (!response.ok) {
                    console.error(`فشلت الموافقة على المنتج رقم ${id}`);
                }
            });
        });

        // إعادة تحميل الصفحة بعد ثانية
        setTimeout(() => location.reload(), 1000);
    });
</script>
</x-dashboard>
</x-app>
