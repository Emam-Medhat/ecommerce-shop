<x-navbar title="تسجيل حساب جديد">

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mb-4 text-center text-primary">تسجيل حساب جديد</h3>

            @if($errors->any())
                <div class="alert alert-danger text-center">{{ $errors->first() }}</div>
            @endif

            <form action="{{ route('register.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>الاسم</label>
                    <input type="text" name="name" class="form-control" required value="{{ old('name') }}">
                </div>

                <div class="mb-3">
                    <label>البريد الإلكتروني</label>
                    <input type="email" name="email" class="form-control" required value="{{ old('email') }}">
                </div>

                 <div class="mb-3">
                    <label>الدور (Role)</label>
                    <select name="role" class="form-control" required>
                        <option value="">-- اختر الدور --</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>مستخدم</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>مدير</option>
                        <option value="seller" {{ old('role') == 'seller' ? 'selected' : '' }}>بائع</option>
                    </select>
                </div>


                <div class="mb-3">
                    <label>كلمة المرور</label>
                    <input type="password" name="password" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>تأكيد كلمة المرور</label>
                    <input type="password" name="password_confirmation" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>صورة الملف الشخصي (اختياري)</label>
                    <input type="file" name="profile_picture" class="form-control" required > 
                </div>

                <div class="mb-3">
                    <label>رقم الهاتف (اختياري)</label>
                    <input type="text" name="phone" class="form-control" required value="{{ old('phone') }}">
                </div>

                <div class="mb-3">
                    <label>العنوان (اختياري)</label>
                    <input type="text" name="address" class="form-control" required value="{{ old('address') }}">
                </div>

                <button class="btn btn-primary w-100">تسجيل</button>
            </form>

            <div class="text-center mt-3">
                لديك حساب بالفعل؟ <a href="{{ route('login') }}">تسجيل الدخول</a>
            </div>
        </div>
    </div>
</div>

</x-navbar>
