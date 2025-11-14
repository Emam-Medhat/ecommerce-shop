<x-navbar title="{{ __('messages.contact_details') }}">

<div class="container py-5">
    <div class="contact-details-card">
        <div class="card-header">
            <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
            <h2>{{ __('messages.contact_details') }}</h2>
        </div>
        <div class="card-body">
            <div class="from-user">
                <i class="fas fa-user icon"></i>
                <span>{{ __('messages.from') }}: {{ $contact->name }}</span>
            </div>
            <div class="contact-info-grid">
                <div class="contact-info-item">
                    <i class="fas fa-envelope icon"></i>
                    <strong>{{ __('messages.email') }}:</strong>
                    <span>{{ $contact->email }}</span>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-phone icon"></i>
                    <strong>{{ __('messages.phone') }}:</strong>
                    <span>{{ $contact->phone }}</span>
                </div>
                <div class="contact-info-item">
                    <i class="fas fa-tag icon"></i>
                    <strong>{{ __('messages.subject') }}:</strong>
                    <span>{{ $contact->subject }}</span>
                </div>
            </div>
            <div class="contact-message-box">
                <strong>{{ __('messages.message') }}:</strong>
                {{ $contact->message }}
            </div>
            <div class="sent-at">
                <i class="far fa-clock"></i>
                {{ __('messages.sent_at') }}: {{ $contact->created_at->format('Y-m-d H:i') }}
            </div>
        </div>
        <div class="card-footer">
            <a href="{{ route('admin.contacts.index') }}" class="btn btn-electro btn-electro-back">
                <i class="fas fa-arrow-left"></i> {{ __('messages.back') }}
            </a>
            <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                  onsubmit="return confirm('{{ __('messages.confirm_delete_message') }}');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-electro btn-electro-delete">
                    <i class="fas fa-trash"></i> {{ __('messages.delete') }}
                </button>
            </form>
        </div>
    </div>
</div>

<script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

@include('components.footer')

</x-navbar>
