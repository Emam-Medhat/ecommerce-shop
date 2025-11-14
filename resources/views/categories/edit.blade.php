<x-navbar title="{{ __('messages.edit_category') }}">
<div class="container">
    <h1>{{ __('messages.edit_category') }}</h1>

    <form action="{{ route('categories.update', $category) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>{{ __('messages.category_name') }}</label>
            <input type="text" name="name" class="form-control" value="{{ $category->name }}" required>
        </div>

        <div class="mb-3">
            <label>{{ __('messages.parent_category') }}</label>
            <select name="parent_id" class="form-control">
                <option value="">{{ __('messages.none') }}</option>
                @foreach($parents as $parent)
                    <option value="{{ $parent->id }}" {{ $category->parent_id == $parent->id ? 'selected' : '' }}>
                        {{ $parent->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.update_category') }}</button>
    </form>
</div>
</x-navbar>
