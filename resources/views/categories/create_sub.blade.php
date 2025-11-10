<x-navbar title="create subcategory">
<div class="container">
    <h1>Add Subcategory</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('subcategories.store') }}" method="POST">
        @csrf

        <!-- اسم القسم الفرعي -->
        <div class="mb-3">
            <label>Subcategory Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter subcategory name" required>
        </div>

        <!-- اختيار القسم الرئيسي -->
        <div class="mb-3">
            <label>Main Category</label>
            <select name="parent_id" class="form-control" required>
                <option value="">-- Select Main Category --</option>
                @foreach($mainCategories as $main)
                    <option value="{{ $main->id }}">{{ $main->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Add Subcategory</button>
    </form>
</div>
</x-navbar>