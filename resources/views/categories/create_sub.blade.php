<x-app>
    <x-dashboard>
        <div class="container">
            <h1>{{ __('messages.add_subcategory') }}</h1>

            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form action="{{ route('subcategories.store') }}" method="POST">
                @csrf

                <!-- اسم القسم الفرعي -->
                <div class="mb-3">
                    <label>{{ __('messages.subcategory_name') }}</label>
                    <input type="text" name="name" class="form-control" placeholder="{{ __('messages.enter_subcategory_name') }}" required>
                </div>

                <!-- اختيار القسم الرئيسي -->
                <div class="mb-3">
                    <label>{{ __('messages.main_category') }}</label>
                    <select name="parent_id" class="form-control" required>
                        <option value="">{{ __('messages.select_main_category') }}</option>
                        @foreach($mainCategories as $main)
                            <option value="{{ $main->id }}">{{ $main->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary">{{ __('messages.add_subcategory') }}</button>
            </form>
        </div>
    </x-dashboard>
</x-app>
