<x-navbar title="create category">

<div class="container">
    <h1>Add Main Category</h1>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label>Category Name</label>
            <input type="text" name="name" class="form-control" placeholder="Enter main category name" required>
        </div>

        <button type="submit" class="btn btn-primary">Add Main Category</button>
    </form>
</div>



</x-navbar>