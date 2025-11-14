<x-app>
<x-dashboard>
<div class="container py-5">
    <h2 class="mb-4 text-center text-primary">{{ __('messages.all_contact_messages') }}</h2>

    @if (session('success'))
        <div class="alert alert-success text-center">
            {{ session('success') }}
        </div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>{{ __('messages.name') }}</th>
                    <th>{{ __('messages.email') }}</th>
                    <th>{{ __('messages.subject') }}</th>
                    <th>{{ __('messages.phone') }}</th>
                    <th>{{ __('messages.sent_at') }}</th>
                    <th>{{ __('messages.actions') }}</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($contacts as $contact)
                    <tr>
                        <td>{{ $contact->id }}</td>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->subject }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->created_at->format('Y-m-d H:i') }}</td>
                        <td>
                            <a href="{{ route('admin.contacts.show', $contact->id) }}" class="btn btn-sm btn-info">
                                <i class="fas fa-eye"></i> {{ __('messages.view') }}
                            </a>

                            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                                  style="display:inline-block;" 
                                  onsubmit="return confirm('{{ __('messages.confirm_delete_message') }}');">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i> {{ __('messages.delete') }}
                                </button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="7" class="text-muted">{{ __('messages.no_messages_found') }}</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

</x-dashboard>
</x-app>
