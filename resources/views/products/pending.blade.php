<x-app>
    <x-dashboard>

        <div class="container my-5">
            <div class="card shadow rounded p-4">

                <!-- رأس الكارد -->
                <div class="card-header bg-primary text-white rounded-top p-3 text-center">
                    <h3 class="mb-1">المنتجات في انتظار الموافقة</h3>
                    <p class="mb-0">مراجعة وإدارة المنتجات المعلقة بسهولة</p>
                </div>

                <!-- محتوى الكارد -->
                <div class="card-body mt-3">

                    <!-- إشعارات النجاح / الخطأ -->
                    @if(session('success'))
                        <div class="alert alert-success">
                            {{ session('success') }}
                        </div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

                    @if($pendingProducts->count() > 0)

                        <!-- أزرار موافقة / رفض المحدد -->
                        <form action="{{ route('admin.products.bulkAction') }}" method="POST" id="bulk-action-form">
                            @csrf
                            <input type="hidden" name="action" id="bulk-action-type" value="">
                            <div class="mb-3 d-flex gap-2">
                                <button type="button" class="btn btn-success" onclick="submitBulkAction('approve')">
                                    موافقة المحدد
                                </button>
                                <button type="button" class="btn btn-danger" onclick="submitBulkAction('reject')">
                                    رفض المحدد
                                </button>
                            </div>

                            <!-- الجدول -->
                            <div class="table-responsive">
                                <table class="table table-bordered table-hover align-middle text-center">
                                    <thead class="table-light">
                                        <tr>
                                            <th><input type="checkbox" id="select-all"></th>
                                            <th>الصورة</th>
                                            <th>اسم المنتج</th>
                                            <th>الفئة</th>
                                            <th>السعر</th>
                                            <th>البائع</th>
                                            <th>الإجراءات</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($pendingProducts as $product)
                                            <tr>
                                                <td>
                                                    <input type="checkbox" name="selected_products[]" value="{{ $product->id }}" class="select-item">
                                                </td>
                                                <td>
                                                    <img src="{{ Str::startsWith($product->image, ['http://', 'https://']) 
                                                        ? $product->image 
                                                        : asset('storage/' . $product->image) }}" 
                                                        alt="{{ $product->name }}"
                                                        style="width: 60px; height: 60px; object-fit: cover; border-radius: 5px;">
                                                </td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->category->name ?? 'غير محددة' }}</td>
                                                <td>{{ $product->price }}</td>
                                                <td>{{ $product->user->name ?? 'غير معروف' }}</td>
                                                <td class="d-flex flex-column gap-1">
                                                    <a href="{{ route('products.show', $product->id) }}" class="btn btn-info btn-sm">عرض</a>
                                                    <form action="{{ route('admin.products.approve', $product->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-success btn-sm">موافقة</button>
                                                    </form>
                                                    <form action="{{ route('admin.products.reject', $product->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="btn btn-danger btn-sm">رفض</button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </form>

                    @else
                        <div class="alert alert-warning text-center">
                            لا توجد منتجات في انتظار الموافقة حالياً
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

    </x-dashboard>
</x-app>
