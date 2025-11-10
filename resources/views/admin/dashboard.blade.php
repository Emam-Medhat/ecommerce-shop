<x-navbar title="dashboard">

<div class="container py-5">
    <h3 class="mb-4 text-center text-primary">لوحة تحكم الأدمن</h3>
    <div class="row justify-content-center">
        <div class="col-md-4 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">عدد المستخدمين</h5>
                    <p class="card-text display-6">{{ $usersCount }}</p>
                </div>
            </div>
        </div>
        <div class="col-md-4 mb-3">
            <div class="card shadow text-center">
                <div class="card-body">
                    <h5 class="card-title">عدد الأدمن</h5>
                    <p class="card-text display-6">{{ $adminsCount }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        {{-- <a href="{{ route('admin.users') }}" class="btn btn-outline-primary">إدارة المستخدمين</a> --}}
    </div>
</div>

</x-navbar>
