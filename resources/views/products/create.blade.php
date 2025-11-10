<x-navbar title="🛍️ إضافة منتج جديد">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h3 class="mb-4 text-center text-primary">🛍️ إضافة منتج جديد</h3>

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

            <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

<input type="hidden" name="user_id" value="{{ auth()->id() }}">

                
                {{-- اسم المنتج --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">اسم المنتج</label>
                    <input type="text" name="name" class="form-control" required>
                </div>

                {{-- القسم الرئيسي --}}
              <div class="mb-3">
    <label class="form-label fw-bold">القسم الرئيسي</label>
    <select id="main-category" class="form-select" required>
        <option value="">اختر القسم الرئيسي</option>
        @foreach ($mainCategories as $main)
            <option value="{{ $main->id }}">{{ $main->name }}</option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label class="form-label fw-bold">القسم الفرعي</label>
    <select name="category_id" id="sub-category" class="form-select" required>
        <option value="">اختر القسم الفرعي</option>
    </select>
</div>

<a id="view-products" href="#" class="btn btn-primary mt-2 d-none">عرض المنتجات</a>


                {{-- الوصف --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">الوصف</label>
                    <textarea name="description" class="form-control" rows="3"></textarea>
                </div>

                {{-- السعر --}}
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">السعر</label>
                        <input type="number" step="0.01" name="price" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label fw-bold">السعر بعد الخصم</label>
                        <input type="number" step="0.01" name="discount_price" class="form-control">
                    </div>
                </div>

                {{-- الحالة --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">حالة المنتج</label>
                    <select name="condition" class="form-select" required>
                        <option value="new">جديد</option>
                        <option value="used">مستعمل</option>
                    </select>
                </div>

                {{-- الصورة --}}
                <div class="mb-3">
                    <label class="form-label fw-bold">صورة المنتج</label>
                    <input type="file" name="image" class="form-control">
                </div>

                <hr>
                <h5 class="text-primary">⚙️ خصائص المنتج</h5>

                <div id="attributes-wrapper">
                    <div class="attribute-item border rounded p-3 mb-3">
                        <div class="row">
                            <div class="col-md-5">
                                <input type="text" name="attributes[0][name]" class="form-control" placeholder="اسم الخاصية">
                            </div>
                            <div class="col-md-5">
                                <input type="text" name="attributes[0][value]" class="form-control" placeholder="القيمة">
                            </div>
                            <div class="col-md-2 text-end">
                                <button type="button" class="btn btn-danger remove-attr">✖</button>
                            </div>
                        </div>
                    </div>
                </div>

                <button type="button" id="add-attr" class="btn btn-outline-primary mb-3">+ إضافة خاصية</button>

                <button type="submit" class="btn btn-success w-100">💾 حفظ المنتج</button>
            </form>
        </div>
    </div>
</div>

{{-- سكريبت الخصائص + الأقسام --}}
<script>
    // --- إضافة خاصية جديدة ---
    let index = 1;
    document.getElementById('add-attr').addEventListener('click', function () {
        const wrapper = document.getElementById('attributes-wrapper');
        const newAttr = document.createElement('div');
        newAttr.classList.add('attribute-item', 'border', 'rounded', 'p-3', 'mb-3');
        newAttr.innerHTML = `
            <div class="row">
                <div class="col-md-5">
                    <input type="text" name="attributes[${index}][name]" class="form-control" placeholder="اسم الخاصية">
                </div>
                <div class="col-md-5">
                    <input type="text" name="attributes[${index}][value]" class="form-control" placeholder="القيمة">
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger remove-attr">✖</button>
                </div>
            </div>
        `;
        wrapper.appendChild(newAttr);
        index++;
    });

    // --- حذف خاصية ---
 // --- الأقسام المتداخلة ---
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
            data.forEach(cat => options += `<option value="${cat.id}">${cat.name}</option>`);
            document.getElementById('sub-category').innerHTML = options;
        })
        .catch(error => console.error('حدث خطأ:', error));
});

</script>

</x-navbar>
