<x-navbar title="🛍️ إضافة منتج جديد">
<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8 col-md-10">
            <div class="card shadow-lg rounded-4 border-0">
                <div class="card-body p-5">
                    <h3 class="mb-4 text-center text-primary fw-bold">🛍️ {{ __('messages.add_new_product') }}</h3>

                    {{-- عرض الأخطاء --}}
                    @if ($errors->any())
                        <div class="alert alert-danger shadow-sm rounded">
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
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.product_name') }}</label>
                            <input type="text" name="name" class="form-control form-control-lg shadow-sm" placeholder="{{ __('messages.product_name') }}" required>
                        </div>

                        {{-- القسم الرئيسي --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.main_category') }}</label>
                            <select id="main-category" class="form-select form-select-lg shadow-sm" required>
                                <option value="">{{ __('messages.select_main_category') }}</option>
                                @foreach ($mainCategories as $main)
                                    <option value="{{ $main->id }}">{{ $main->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        {{-- القسم الفرعي --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.sub_category') }}</label>
                            <select name="category_id" id="sub-category" class="form-select form-select-lg shadow-sm" required>
                                <option value="">{{ __('messages.select_sub_category') }}</option>
                            </select>
                        </div>

                        <a id="view-products" href="#" class="btn btn-outline-primary mb-4 d-none">{{ __('messages.view_products') }}</a>

                        {{-- الوصف --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.description') }}</label>
                            <textarea name="description" class="form-control shadow-sm" rows="4" placeholder="{{ __('messages.description') }}"></textarea>
                        </div>

                        {{-- السعر --}}
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ __('messages.price') }}</label>
                                <input type="number" step="0.01" name="price" class="form-control form-control-lg shadow-sm" placeholder="{{ __('messages.price') }}" required>
                            </div>
                            <div class="col-md-6">
                                <label class="form-label fw-bold">{{ __('messages.discount_price') }}</label>
                                <input type="number" step="0.01" name="discount_price" class="form-control form-control-lg shadow-sm" placeholder="{{ __('messages.discount_price') }}">
                            </div>
                        </div>

                        {{-- الحالة --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.product_condition') }}</label>
                            <select name="condition" class="form-select form-select-lg shadow-sm" required>
                                <option value="new">{{ __('messages.new') }}</option>
                                <option value="used">{{ __('messages.used') }}</option>
                            </select>
                        </div>

                        {{-- الصورة --}}
                        <div class="mb-4">
                            <label class="form-label fw-bold">{{ __('messages.product_image') }}</label>
                            <input type="file" name="image" class="form-control shadow-sm">
                        </div>

                        <hr class="my-4">

                        <h5 class="text-primary fw-bold mb-3">⚙️ {{ __('messages.product_attributes') }}</h5>

                        <div id="attributes-wrapper">
                            <div class="attribute-item border rounded p-3 mb-3 shadow-sm bg-light">
                                <div class="row g-2 align-items-center">
                                    <div class="col-md-5">
                                        <input type="text" name="attributes[0][name]" class="form-control" placeholder="{{ __('messages.attribute_name') }}">
                                    </div>
                                    <div class="col-md-5">
                                        <input type="text" name="attributes[0][value]" class="form-control" placeholder="{{ __('messages.attribute_value') }}">
                                    </div>
                                    <div class="col-md-2 text-end">
                                        <button type="button" class="btn btn-danger btn-sm remove-attr">✖</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button type="button" id="add-attr" class="btn btn-outline-primary mb-4">+ {{ __('messages.add_attribute') }}</button>

                        <button type="submit" class="btn btn-success w-100 py-3 fw-bold">💾 {{ __('messages.save_product') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

{{-- سكريبت الخصائص + الأقسام --}}
<script>
    // إضافة خاصية جديدة
    let index = 1;
    document.getElementById('add-attr').addEventListener('click', function () {
        const wrapper = document.getElementById('attributes-wrapper');
        const newAttr = document.createElement('div');
        newAttr.classList.add('attribute-item', 'border', 'rounded', 'p-3', 'mb-3', 'shadow-sm', 'bg-light');
        newAttr.innerHTML = `
            <div class="row g-2 align-items-center">
                <div class="col-md-5">
                    <input type="text" name="attributes[${index}][name]" class="form-control" placeholder="{{ __('messages.attribute_name') }}">
                </div>
                <div class="col-md-5">
                    <input type="text" name="attributes[${index}][value]" class="form-control" placeholder="{{ __('messages.attribute_value') }}">
                </div>
                <div class="col-md-2 text-end">
                    <button type="button" class="btn btn-danger btn-sm remove-attr">✖</button>
                </div>
            </div>
        `;
        wrapper.appendChild(newAttr);
        index++;
    });

    // حذف خاصية
    document.addEventListener('click', function(e){
        if(e.target.classList.contains('remove-attr')){
            e.target.closest('.attribute-item').remove();
        }
    });

    // الأقسام المتداخلة
    document.getElementById('main-category').addEventListener('change', function () {
        const mainId = this.value;
        if (!mainId) {
            document.getElementById('sub-category').innerHTML = '<option value="">{{ __('messages.select_sub_category') }}</option>';
            return;
        }

        fetch(`/categories/${mainId}/subcategories`)
            .then(res => res.json())
            .then(data => {
                let options = '<option value="">{{ __('messages.select_sub_category') }}</option>';
                data.forEach(cat => options += `<option value="${cat.id}">${cat.name}</option>`);
                document.getElementById('sub-category').innerHTML = options;
            })
            .catch(error => console.error('حدث خطأ:', error));
    });
</script>
</x-navbar>
