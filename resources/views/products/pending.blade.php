<x-navbar title="المنتجات المعلقة">

<style>
/* 🎨 تحسين عام */
body {
    background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%) !important;
    font-family: "Tajawal", "Cairo", sans-serif;
    min-height: 100vh;
}

/* تحسين الكارد */
.card {
    transition: all 0.4s ease;
    box-shadow: 0 20px 40px rgba(0,0,0,0.1);
}
.card:hover {
    transform: translateY(-10px);
    box-shadow: 0 30px 60px rgba(0,0,0,0.15);
}

/* رأس الكارد */
.card-header {
    position: relative;
    overflow: hidden;
}
.card-header .overlay {
    background: linear-gradient(45deg, rgba(102,126,234,0.3), rgba(118,75,162,0.3));
}
.card-header .content {
    animation: fadeInUp 0.8s ease-out;
}

/* الجدول */
.table {
    border-radius: 15px !important;
    overflow: hidden;
    box-shadow: 0 10px 30px rgba(0,0,0,0.1);
}
.table thead th {
    background: linear-gradient(135deg, #4f46e5, #7c3aed) !important;
    color: #fff;
    font-weight: 700;
    padding: 15px;
    border: none;
}
.fw-bold {
    font-weight: 300 !important;
}
.table tbody tr {
    transition: all 0.3s ease;
}
.table tbody tr:hover {
    background-color: #f1f5f9;
    transform: scale(1.02);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}
.table tbody tr:hover img {
    transform: scale(1.1);
}

/* الأزرار */
.btn {
    transition: all 0.3s ease;
    font-weight: 600;
}
.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 8px 20px rgba(0,0,0,0.2);
}
.btn-success {
    background: linear-gradient(135deg, #10b981, #059669);
    border: none;
}
.btn-danger {
    background: linear-gradient(135deg, #ef4444, #dc2626);
    border: none;
}
.btn-info {
    background: linear-gradient(135deg, #06b6d4, #0891b2);
    border: none;
    color: #fff;
}

/* الحالة الفارغة */
.empty-state {
    animation: fadeIn 1s ease-out;
}

/* الرسوم المتحركة */
@keyframes fadeInUp {
    from { opacity: 0; transform: translateY(30px); }
    to { opacity: 1; transform: translateY(0); }
}
@keyframes fadeIn {
    from { opacity: 0; }
    to { opacity: 1; }
}

/* الاستجابة */
@media (max-width: 768px) {
    .table-responsive { font-size: 0.9rem; }
    .btn { padding: 8px 16px; font-size: 0.85rem; }
    .card-header h3 { font-size: 1.5rem; }
    .d-flex { flex-direction: column; align-items: center; }
    .gap-2 { gap: 1rem !important; }
}
@media (min-width: 1400px) {
    .container-xxl, .container-xl, .container-lg, .container-md, .container-sm, .container {
        max-width: 1850px;
    }
}
</style>

<div class="container my-5">
    <div class="card border-0 shadow-xl rounded-5 overflow-hidden">
        <!-- رأس الكارد -->
        <div class="card-header text-white text-center py-5"
             style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%); position: relative;">
            <div class="overlay" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: rgba(0,0,0,0.1); border-radius: 5px;"></div>
            <div class="content" style="position: relative; z-index: 1;">
                <h3 class="fw-bold mb-0 display-5">
                    <i class="bi bi-hourglass-split me-3 fs-1"></i> المنتجات في انتظار الموافقة
                </h3>
                <p class="mt-2 mb-0 opacity-75">مراجعة وإدارة المنتجات المعلقة بسهولة</p>
            </div>
        </div>

        <!-- محتوى الكارد -->
        <div class="card-body bg-light p-5">

            <!-- إشعارات النجاح / الخطأ -->
            @if(session('success'))
                <div class="alert alert-success text-center rounded-pill shadow-sm mb-4">
                    <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="alert alert-danger text-center rounded-pill shadow-sm mb-4">
                    <i class="bi bi-x-circle-fill me-2"></i> {{ session('error') }}
                </div>
            @endif

            @if($pendingProducts->count() > 0)

                <!-- أزرار موافقة / رفض المحدد -->
                <form action="{{ route('admin.products.bulkAction') }}" method="POST" id="bulk-action-form">
                    @csrf
                    <input type="hidden" name="action" id="bulk-action-type" value="">
                    <div class="d-flex justify-content-end mb-4 gap-2 flex-wrap">
                        <button type="button" onclick="submitBulkAction('approve')" 
                                class="btn btn-success px-4 py-2 rounded-pill shadow-lg d-flex align-items-center gap-2">
                            <i class="bi bi-check2-all fs-5"></i> موافقة المحدد
                        </button>
                        <button type="button" onclick="submitBulkAction('reject')" 
                                class="btn btn-danger px-4 py-2 rounded-pill shadow-lg d-flex align-items-center gap-2">
                            <i class="bi bi-x-circle fs-5"></i> رفض المحدد
                        </button>
                    </div>

                    <!-- الجدول -->
                    <div class="table-responsive">
                        <table class="table align-middle table-hover text-center bg-white rounded-4 shadow-lg">
                            <thead class="table-dark border-bottom border-4 border-primary">
                                <tr class="text-white fw-bold">
                                    <th scope="col" style="width: 50px;"><input type="checkbox" id="select-all"></th>
                                    <th scope="col" style="width: 100px;"><i class="bi bi-image me-1"></i> الصورة</th>
                                    <th scope="col"><i class="bi bi-tag me-1"></i> اسم المنتج</th>
                                    <th scope="col"><i class="bi bi-folder me-1"></i> الفئة</th>
                                    <th scope="col"><i class="bi bi-cash me-1"></i> السعر</th>
                                    <th scope="col"><i class="bi bi-person me-1"></i> البائع</th>
                                    <th scope="col" style="width: 300px;"><i class="bi bi-gear me-1"></i> الإجراءات</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($pendingProducts as $product)
                                    <tr class="align-middle border-bottom border-light">
                                        <td>
                                            <input type="checkbox" name="selected_products[]" value="{{ $product->id }}" class="select-item">
                                        </td>
                                        <td>
                                            <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) 
                                                ? $product->image 
                                                : asset('storage/' . $product->image) }}" 
                                                alt="{{ $product->name }}" 
                                                class="rounded-4 shadow-sm border object-fit-cover img-fluid" 
                                                style="width: 70px; height: 70px; transition: transform 0.3s ease;">
                                        </td>
                                        <td class="fw-bold text-dark fs-5">{{ $product->name }}</td>
                                        <td class="text-muted">{{ $product->category->name ?? 'غير محددة' }}</td>
                                        <td class="text-success fw-bold fs-5">${{ number_format($product->price, 2) }}</td>
                                        <td class="fw-semibold">{{ $product->user->name ?? 'غير معروف' }}</td>
                                         <td>
                                        <div class="d-flex justify-content-center gap-2 flex-wrap">
                                            <a href="{{ route('products.show', $product->id) }}" 
                                               class="btn btn-info btn-sm px-3 py-2 rounded-pill d-flex align-items-center gap-2 shadow-lg">
                                                <i class="bi bi-eye-fill"></i> عرض
                                            </a>

                                            <form action="{{ route('admin.products.approve', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-success btn-sm px-3 py-2 rounded-pill d-flex align-items-center gap-2 shadow-lg">
                                                    <i class="bi bi-check-circle-fill"></i> موافقة
                                                </button>
                                            </form>

                                            <form action="{{ route('admin.products.reject', $product->id) }}" method="POST" class="d-inline">
                                                @csrf
                                                <button type="submit" 
                                                        class="btn btn-danger btn-sm px-3 py-2 rounded-pill d-flex align-items-center gap-2 shadow-lg">
                                                    <i class="bi bi-x-circle-fill"></i> رفض
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </form>

            @else
                <div class="text-center py-5 text-muted">
                    <div class="empty-state">
                        <i class="bi bi-box-seam display-1 d-block mb-4 text-primary opacity-50"></i>
                        <h4 class="fw-bold mb-3">لا توجد منتجات في انتظار الموافقة حالياً</h4>
                        <p class="fs-6">جميع المنتجات تمت مراجعتها بنجاح. تحقق لاحقاً للمزيد!</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- سكربت تحديد الكل وإرسال النموذج -->
<script>
    document.getElementById('select-all').addEventListener('change', function() {
        const checked = this.checked;
        document.querySelectorAll('.select-item').forEach(cb => cb.checked = checked);
    });

    function submitBulkAction(action) {
        const selected = Array.from(document.querySelectorAll('.select-item:checked')).map(cb => cb.value);
        if(selected.length === 0){
            alert('⚠️ يرجى اختيار منتج واحد على الأقل!');
            return;
        }
        document.getElementById('bulk-action-type').value = action;

        const form = document.getElementById('bulk-action-form');

        // إزالة أي hidden inputs سابقة
        form.querySelectorAll('input[name="selected_products[]"]').forEach(el => el.remove());

        selected.forEach(id => {
            const input = document.createElement('input');
            input.type = 'hidden';
            input.name = 'selected_products[]';
            input.value = id;
            form.appendChild(input);
        });

        form.submit();
    }
</script>

@include('components.footer')
</x-navbar>
