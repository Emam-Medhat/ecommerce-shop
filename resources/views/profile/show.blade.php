 <x-navbar :title="__('messages.profile')">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <h3 class="mb-4 text-center text-primary">{{ __('messages.profile') }}</h3>

            <div class="text-center mb-4">
                @if($user->profile_picture)
                    <img src="{{ asset('storage/'.$user->profile_picture) }}" class="rounded-circle" width="120" height="120">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=120"
                         class="rounded-circle" width="120" height="120">
                @endif
            </div>

            <div class="mb-3">
                <strong>{{ __('messages.name') }}:</strong>
                <p>{{ $user->name }}</p>
            </div>

            <div class="mb-3">
                <strong>{{ __('messages.email') }}:</strong>
                <p>{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                <strong>{{ __('messages.role') }}:</strong>
                <p>{{ ucfirst($user->role) }}</p>

            <div class="mb-3">
                <strong>{{ __('messages.phone') }}:</strong>
                <p>{{ $user->phone ?? __('messages.not_specified') }}</p>
            </div>

            <div class="mb-3">
                <strong>{{ __('messages.address') }}:</strong>
                <p>{{ $user->address ?? __('messages.not_specified') }}</p>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">{{ __('messages.edit_profile') }}</a>
            </div>
        </div>
    </div>
</div>

</x-navbar>