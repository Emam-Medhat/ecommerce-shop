<x-navbar title=" edit product">
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">✏️ تعديل المنتج</h2>

    <div class="card shadow-lg p-4 border-0 rounded-4">
        <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- اسم المنتج --}}
            <div class="mb-3">
                <label class="form-label">اسم المنتج</label>
                <input type="text" name="name" value="{{ old('name', $product->name) }}" class="form-control" required>
            </div>

            {{-- السعر --}}
            <div class="mb-3">
                <label class="form-label">السعر</label>
                <input type="number" name="price" value="{{ old('price', $product->price) }}" class="form-control" required>
            </div>

            {{-- الوصف --}}
            <div class="mb-3">
                <label class="form-label">الوصف</label>
                <textarea name="description" class="form-control" rows="4" required>{{ old('description', $product->description) }}</textarea>
            </div>

            {{-- الفئة --}}
            <div class="mb-3">
                <label class="form-label">الفئة</label>
                <select name="category" class="form-select" required>
                    <option value="Laptop" {{ $product->category == 'Laptop' ? 'selected' : '' }}>Laptop</option>
                    <option value="Camera" {{ $product->category == 'Camera' ? 'selected' : '' }}>Camera</option>
                    <option value="Headphone" {{ $product->category == 'Headphone' ? 'selected' : '' }}>Headphone</option>
                </select>
            </div>

            {{-- الصورة الحالية --}}
            <div class="mb-3">
                <label class="form-label">الصورة الحالية</label><br>
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" width="150" class="rounded-3 border mb-2">
                @else
                    <p class="text-muted">لا توجد صورة</p>
                @endif
            </div>

            {{-- تغيير الصورة --}}
            <div class="mb-3">
                <label class="form-label">تغيير الصورة</label>
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

</x-navbar>