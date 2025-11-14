<x-app>
    <x-dashboard>
        <div class="container py-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="text-primary fw-bold">{{ __('messages.categories') }}</h1>
                <a href="{{ route('categories.create') }}" class="btn btn-success btn-lg shadow-sm">
                    <i class="fas fa-plus me-2"></i> {{ __('messages.add_new_category') }}
                </a>
            </div>

            <!-- Alert -->
            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show shadow-sm" role="alert">
                    {{ session('success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Categories Table -->
            <div class="card shadow-sm">
                <div class="card-body p-0">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>{{ __('messages.subcategory') }}</th>
                                <th>{{ __('messages.category') }}</th>
                                <th class="text-center">{{ __('messages.actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                        @forelse($categories as $category)
                            <tr>
                                <td class="fw-bold">{{ $category->id }}</td>
                                <td>{{ $category->name }}</td>
                                <td>{{ $category->parent?->name ?? '-' }}</td>
                                <td class="text-center">
                                    <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning shadow-sm me-1">
                                        <i class="fas fa-edit"></i> {{ __('messages.edit') }}
                                    </a>
                                    <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger shadow-sm" onclick="return confirm('{{ __('messages.confirm_delete') }}')">
                                            <i class="fas fa-trash-alt"></i> {{ __('messages.delete') }}
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center py-3 text-muted">{{ __('messages.no_categories') }}</td>
                            </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-3 d-flex justify-content-end">
                {{-- {{ $categories->links() }} --}}
            </div>
        </div>

        <!-- Custom Styles -->
        <style>
            table.table-hover tbody tr:hover { background-color: #f2f7ff; }
            .btn-success, .btn-warning, .btn-danger { transition: all 0.3s ease; }
            .btn-success:hover { background-color: #28a745cc; }
            .btn-warning:hover { background-color: #ffc107cc; }
            .btn-danger:hover { background-color: #dc3545cc; }
            .card.shadow-sm { border-radius: 10px; }
        </style>
    </x-dashboard>
</x-app>
