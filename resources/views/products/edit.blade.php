<x-navbar title="✏️ تعديل المنتج">

<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">✏️ تعديل المنتج</h2>

    {{-- عرض الأخطاء --}}
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card shadow-lg p-4 border-0 rounded-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- اسم المنتج --}}
            <div class="mb-3">
                <label class="form-label fw-bold">اسم المنتج</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
            </div>

            {{-- القسم الرئيسي --}}
            <div class="mb-3">
                <label class="form-label fw-bold">القسم الرئيسي</label>
                <select id="main-category" class="form-select" required>
                    <option value="">اختر القسم الرئيسي</option>
                    @foreach ($mainCategories as $main)
                        <option value="{{ $main->id }}"
                            {{ $product->category && $product->category->parent_id == $main->id ? 'selected' : '' }}>
                            {{ $main->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- القسم الفرعي --}}
            <div class="mb-3">
                <label class="form-label fw-bold">القسم الفرعي</label>
                <select name="category_id" id="sub-category" class="form-select" required>
                    <option value="{{ $product->category_id }}">{{ $product->category->name ?? 'اختر القسم الفرعي' }}</option>
                </select>
            </div>

            {{-- السعر --}}
            <div class="mb-3">
                <label class="form-label fw-bold">السعر</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
            </div>

            {{-- السعر بعد الخصم --}}
            <div class="mb-3">
                <label class="form-label fw-bold">السعر بعد الخصم</label>
                <input type="number" step="0.01" name="discount_price"
                       value="{{ old('discount_price', $product->discount_price) }}" class="form-control">
            </div>

            {{-- الوصف --}}
            <div class="mb-3">
                <label class="form-label fw-bold">الوصف</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- الحالة --}}
            <div class="mb-3">
                <label class="form-label fw-bold">حالة المنتج</label>
                <select name="condition" class="form-select" required>
                    <option value="new" {{ $product->condition == 'new' ? 'selected' : '' }}>جديد</option>
                    <option value="used" {{ $product->condition == 'used' ? 'selected' : '' }}>مستعمل</option>
                </select>
            </div>

            {{-- الصورة الحالية --}}
            <div class="mb-3">
                <label class="form-label fw-bold">الصورة الحالية</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="150" class="rounded-3 border mb-2">
                @else
                    <p class="text-muted">لا توجد صورة</p>
                @endif
            </div>

            {{-- تغيير الصورة --}}
            <div class="mb-3">
                <label class="form-label fw-bold">تغيير الصورة</label>
                <input type="file" name="image" class="form-control">
            </div>

            {{-- زر الحفظ --}}
            <div class="text-center">
                <button type="submit" class="btn btn-success px-4">💾 حفظ التعديلات</button>
                <a href="{{ route('admin.products.index') }}" class="btn btn-secondary px-4">🔙 إلغاء</a>
            </div>
        </form>
    </div>
</div>

{{-- سكريبت تحميل الأقسام الفرعية --}}
<script>
document.getElementById('main-category').addEventListener('change', function () {
    const mainId = this.value;
    if (!mainId) {
        document.getElementById('sub-category').innerHTML = '<option value="">اختر القسم الفرعي</option>';
        return;
    }

    fetch(`/categories/${mainId}/subcategories`)
        .then(res => res.json())
        .then(data => {
            let options = '<option value="">اختر القسم الفرعي</option>';
            data.forEach(cat => {
                options += `<option value="${cat.id}">${cat.name}</option>`;
            });
            document.getElementById('sub-category').innerHTML = options;
        })
        .catch(error => console.error('حدث خطأ:', error));
});
</script>

</x-navbar>
