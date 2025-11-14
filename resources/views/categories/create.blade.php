<x-navbar title="{{ __('messages.create_category') }}">

<div class="container">
    <h1>{{ __('messages.add_main_category') }}</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>{{ __('messages.category_name') }}</label>
            <input type="text" name="name" class="form-control" placeholder="{{ __('messages.enter_main_category_name') }}" required>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.add_main_category') }}</button>
    </form>
</div>

</x-navbar>
