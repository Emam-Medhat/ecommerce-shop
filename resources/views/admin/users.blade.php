<x-navbar title="admin users">


    <div class="container py-5">
    <h3 class="mb-4 text-center text-primary">جميع المستخدمين</h3>
    @if(session('success'))
        <div class="alert alert-success text-center">{{ session('success') }}</div>
    @endif
    <table class="table table-bordered bg-white">
        <thead>
            <tr>
                <th>الاسم</th>
                <th>البريد</th>
                <th>الدور</th>
                <th>خيارات</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $u)
            <tr>
                <td>{{ $u->name }}</td>
                <td>{{ $u->email }}</td>
                <td>{{ $u->role }}</td>
                <td>
                    @if($u->role != 'admin')
                    <form method="POST" action="{{ route('admin.users.makeAdmin', $u->id) }}" style="display:inline-block">
                        @csrf
                        <button class="btn btn-sm btn-warning">ترقية لأدمن</button>
                    </form>
                    @endif
                    <form method="POST" action="{{ route('admin.users.delete', $u->id) }}" style="display:inline-block">
                        @csrf
                        <button class="btn btn-sm btn-danger" onclick="return confirm('حذف المستخدم؟')">حذف</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</x-navbar>