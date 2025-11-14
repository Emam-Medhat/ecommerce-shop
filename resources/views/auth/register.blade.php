<x-navbar title="{{ __('messages.register') }}">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mb-4 text-center text-primary">{{ __('messages.register') }}</h3>

            @if($errors->any())
                <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>{{ __('messages.name') }}</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.email') }}</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.role') }}</label>
                    <select name="role" class="form-control" required>
                        <option value="">{{ __('messages.choose_role') }}</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>{{ __('messages.user') }}</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>{{ __('messages.admin') }}</option>
                        <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>{{ __('messages.seller') }}</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.password') }}</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.confirm_password') }}</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.profile_picture') }} ({{ __('messages.optional') }})</label>
                    <input type="file" name="profile_picture" class="form-control">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.phone') }} ({{ __('messages.optional') }})</label>
                    <input type="text" name="phone" class="form-control" value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label>{{ __('messages.address') }} ({{ __('messages.optional') }})</label>
                    <input type="text" name="address" class="form-control" value="{{ old('address') }}">
                </div>

                <button class="btn btn-primary w-100">{{ __('messages.register') }}</button>
            </form>

            <div class="text-center mt-3">
                {{ __('messages.have_account') }} <a href="{{ route('login') }}">{{ __('messages.login') }}</a>
            </div>
        </div>
    </div>
</div>

</x-navbar>
