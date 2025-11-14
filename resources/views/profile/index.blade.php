<x-app>
    <x-dashboard>
    <div class="container py-5">
        <h2 class="text-center mb-5 text-primary fw-bold">
            👥 {{ __('messages.users_list') }}
        </h2>

        @if($users->isEmpty())
            <div class="alert alert-info text-center py-4 fs-5 shadow-sm rounded-4">
                {{ __('messages.no_users_yet') }}
            </div>
        @else
            <div class="row g-4">
                @foreach ($users as $user)
                    <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                        <div class="card shadow-sm border-0 rounded-4 h-100 user-card">
                            <div class="card-header text-center bg-light border-0 p-4">
                                <img
                                    src="{{ $user->profile_picture ? asset('storage/'.$user->profile_picture) : asset('images/default-avatar.png') }}"
                                    alt="{{ $user->name }}"
                                    class="rounded-circle border border-3 border-primary mb-3"
                                    width="100" height="100"
                                    style="object-fit: cover;">
                                <h5 class="fw-bold text-dark mb-1">{{ $user->name }}</h5>
                                <span class="badge {{ $user->role === 'admin' ? 'bg-danger' : 'bg-secondary' }}">
                                    {{ $user->role === 'admin' ? __('messages.admin') : __('messages.regular_user') }}
                                </span>
                            </div>

                            <div class="card-body text-center">
                                <p class="text-muted mb-1">
                                    <i class="fas fa-envelope text-primary me-2" aria-hidden="true"></i>
                                    <span class="visually-hidden">{{ __('messages.email') }}:</span>
                                    {{ $user->email }}
                                </p>

                                @if($user->phone)
                                    <p class="text-muted mb-1">
                                        <i class="fas fa-phone text-success me-2" aria-hidden="true"></i>
                                        <span class="visually-hidden">{{ __('messages.phone') }}:</span>
                                        {{ $user->phone }}
                                    </p>
                                @endif

                                @if($user->address)
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-map-marker-alt text-danger me-2" aria-hidden="true"></i>
                                        <span class="visually-hidden">{{ __('messages.address') }}:</span>
                                        {{ $user->address }}
                                    </p>
                                @endif

                                   @if($user->address)
                                    <p class="text-muted mb-0">
                                        <i class="fas fa-map-marker-alt text-danger me-2" aria-hidden="true"></i>
                                        <span class="visually-hidden">{{ __('messages.role') }}:</span>
                                        {{ $user->role }}
                                    </p>
                                @endif
                            </div>

                            <div class="card-footer bg-white text-center border-0 pb-4">
                                <a href="{{ route('profile.show', $user->id) }}" class="btn btn-outline-primary px-4 rounded-pill btn-hover mb-2">
                                    {{ __('messages.view_profile') }}
                                </a>

                                <form action="{{ route('profile.destroy', $user->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit"
                                            class="btn btn-outline-danger px-4 rounded-pill btn-hover"
                                            onclick="return confirm('{{ __('messages.confirm_delete_user') }}');">
                                        {{ __('messages.delete_user') }}
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @endif
    </div>

    <style>
        .user-card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .user-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
        }
        .btn-hover:hover {
            transform: scale(1.05);
        }
        /* تحسين عرض النصوص الطويلة داخل الكروت */
        .card-body p {
            word-break: break-word;
        }
    </style>
</x-dashboard>
</x-app>

