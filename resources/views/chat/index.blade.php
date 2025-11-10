
<x-navbar title="chat">
<div class="container">
    <div class="row" style="min-height: 80vh;">
        <!-- Users Sidebar -->
        <div class="col-md-3 bg-light border-end" style="overflow-y: auto;">
            <div class="p-3">
                <h5 class="mb-3">Messages</h5>
                @if($users->count())
                    <div class="list-group">
                        @foreach($users as $user)
                            <a href="{{ route('chat.user', $user->id) }}" 
                               class="list-group-item list-group-item-action d-flex align-items-center"
                               style="text-decoration: none;">
                                <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                                     style="width: 40px; height: 40px; font-weight: bold;">
                                    {{ $user->name[0] }}
                                </div>
                                <div>
                                    <div class="font-weight-bold">{{ $user->name }}</div>
                                    <small class="text-muted">{{ $user->email }}</small>
                                </div>
                            </a>
                        @endforeach
                    </div>
                @else
                    <p class="text-muted text-center mt-5">No users available</p>
                @endif
            </div>
        </div>

        <!-- Main Chat Area -->
        <div class="col-md-9 d-flex flex-column justify-content-center align-items-center">
            <div class="text-center">
                <div style="font-size: 60px; margin-bottom: 20px;">💬</div>
                <h3>Select a conversation</h3>
                <p class="text-muted">Choose a user from the list to start chatting</p>
                @if($unreadCount > 0)
                    <div class="alert alert-info mt-3">
                        <strong>{{ $unreadCount }}</strong> unread message(s)
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>

<style>
    .list-group-item {
        transition: background-color 0.2s;
    }
    .list-group-item:hover {
        background-color: #f8f9fa !important;
    }
</style>
</x-navbar>