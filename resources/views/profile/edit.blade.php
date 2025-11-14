 <x-navbar :title="__('messages.edit_profile')">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <h3 class="mb-4 text-center text-primary">{{ __('messages.edit_profile') }}</h3>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                @csrf

                <div class="mb-3 text-center">
                    @if($user->profile_picture)
                        <img src="{{ asset('storage/'.$user->profile_picture) }}" class="rounded-circle mb-3" width="90" height="90">
                    @else
                        <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=90" class="rounded-circle mb-3" width="90" height="90">
                    @endif
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.name') }}</label>
                    <input type="text" name="name" class="form-control" required value="{{ $user->name }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.email') }}</label>
                    <input type="email" class="form-control" value="{{ $user->email }}" disabled>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.phone') }}</label>
                    <input type="text" name="phone" class="form-control" value="{{ $user->phone }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.address') }}</label>
                    <input type="text" name="address" class="form-control" value="{{ $user->address }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.profile_picture') }}</label>
                    <input type="file" name="profile_picture" class="form-control">
                </div>

                <hr>

                <div class="mb-3">
                    <label>{{ __('messages.change_password') }}</label>
                    <input type="password" name="password" class="form-control" placeholder="{{ __('messages.leave_empty_if_no_change') }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.confirm_new_password') }}</label>
                    <input type="password" name="password_confirmation" class="form-control">
                </div>

                <button class="btn btn-success w-100">{{ __('messages.update') }}</button>
            </form>
        </div>
    </div>
</div>

</x-navbar>