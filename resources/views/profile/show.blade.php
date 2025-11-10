 <x-navbar title="الملف الشخصي">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-7 col-lg-6">
            <h3 class="mb-4 text-center text-primary">الملف الشخصي</h3>

            <div class="text-center mb-4">
                @if($user->profile_picture)
                    <img src="{{ asset('storage/'.$user->profile_picture) }}" class="rounded-circle" width="120" height="120">
                @else
                    <img src="https://ui-avatars.com/api/?name={{ urlencode($user->name) }}&background=0D8ABC&color=fff&size=120"
                         class="rounded-circle" width="120" height="120">
                @endif
            </div>

            <div class="mb-3">
                <strong>الاسم:</strong>
                <p>{{ $user->name }}</p>
            </div>

            <div class="mb-3">
                <strong>البريد الإلكتروني:</strong>
                <p>{{ $user->email }}</p>
            </div>
            <div class="mb-3">
                <strong>الدور:</strong>
                <p>{{ ucfirst($user->role) }}</p>

            <div class="mb-3">
                <strong>رقم الهاتف:</strong>
                <p>{{ $user->phone }}</p>
            </div>

            <div class="mb-3">
                <strong>العنوان:</strong>
                <p>{{ $user->address ?? 'غير محدد' }}</p>
            </div>

            <div class="text-center mt-4">
                <a href="{{ route('profile.edit') }}" class="btn btn-primary">تعديل الملف الشخصي</a>
            </div>
        </div>
    </div>
</div>

</x-navbar>

