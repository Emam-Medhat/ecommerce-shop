<x-navbar title="chat show">

<div class="container-fluid">
    <div class="row" style="min-height: 80vh;">
        <!-- Users Sidebar -->
        <div class="col-md-3 bg-light border-end" style="overflow-y: auto;">
            <div class="p-3">
                <h5 class="mb-3">
                    <a href="{{ route('chat.index') }}" style="text-decoration: none; color: inherit;">← Messages</a>
                </h5>
                @foreach(\App\Models\User::where('id', '!=', Auth::id())->orderBy('name')->get() as $otherUser)
                    <a href="{{ route('chat.user', $otherUser->id) }}" 
                       class="list-group-item list-group-item-action d-flex align-items-center mb-2 p-2"
                       style="text-decoration: none; border-radius: 8px;
                              background: {{ $otherUser->id === $user->id ? '#e3f2fd' : 'transparent' }};
                              border-left: {{ $otherUser->id === $user->id ? '3px solid #007bff' : 'none' }};">
                        <div class="rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-2"
                             style="width: 35px; height: 35px; font-weight: bold; font-size: 14px;">
                            {{ $otherUser->name[0] }}
                        </div>
                        <div style="font-size: 14px;">
                            <div class="font-weight-bold">{{ $otherUser->name }}</div>
                        </div>
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Chat Area -->
        <div class="col-md-9 d-flex flex-column">
            <!-- Chat Header -->
            <div class="bg-primary text-white p-3 border-bottom" style="flex: 0 0 auto;">
                <div class="d-flex align-items-center justify-content-between">
                    <div class="d-flex align-items-center">
                        <div class="rounded-circle bg-light text-primary d-flex align-items-center justify-content-center me-3"
                             style="width: 45px; height: 45px; font-weight: bold; font-size: 18px;">
                            {{ $user->name[0] }}
                        </div>
                        <div>
                            <h5 class="mb-0">{{ $user->name }}</h5>
                            <small>{{ $user->email }}</small>
                        </div>
                    </div>
                    <div class="badge bg-success">Online</div>
                </div>
            </div>

            <!-- Messages Container -->
            <div id="messagesContainer" class="flex-grow-1 p-3 overflow-auto" style="background-color: #f8f9fa;">
                @if($messages->count())
                    @foreach($messages as $message)
                        <div class="mb-3 d-flex {{ $message->sender_id === Auth::id() ? 'justify-content-end' : 'justify-content-start' }}">
                            <div style="max-width: 70%; padding: 10px 15px; border-radius: 12px;
                                       background: {{ $message->sender_id === Auth::id() ? '#007bff' : '#e9ecef' }};
                                       color: {{ $message->sender_id === Auth::id() ? 'white' : '#333' }};">
                                <div>{{ $message->message }}</div>
                                <small style="opacity: 0.7; margin-top: 5px; display: block;">
                                    {{ $message->formatted_time }}
                                </small>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="text-center text-muted mt-5">
                        <p>No messages yet. Start the conversation!</p>
                    </div>
                @endif
            </div>

            <!-- Input Area -->
            <div class="p-3 border-top" style="flex: 0 0 auto;">
                <form id="messageForm" class="d-flex gap-2">
                    @csrf
                    <input type="hidden" id="receiverId" value="{{ $user->id }}">
                    <input type="text" 
                           id="messageInput" 
                           class="form-control rounded-pill" 
                           placeholder="Type a message..."
                           autocomplete="off">
                    <button type="submit" 
                            class="btn btn-primary rounded-circle" 
                            id="sendBtn"
                            style="width: 40px; height: 40px; padding: 0;">
                        <span id="sendBtnText">➤</span>
                        <span id="sendBtnSpinner" class="spinner-border spinner-border-sm" role="status" style="display: none;">
                            <span class="visually-hidden">Loading...</span>
                        </span>
                    </button>
                </form>
                <div id="errorMessage" class="alert alert-danger mt-2" style="display: none;"></div>
                <div id="successMessage" class="alert alert-success mt-2" style="display: none;"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>

<script>
    const currentUserId = {{ Auth::id() }};
    const receiverId = {{ $user->id }};
    const messagesContainer = document.getElementById('messagesContainer');
    const messageForm = document.getElementById('messageForm');
    const messageInput = document.getElementById('messageInput');
    const sendBtn = document.getElementById('sendBtn');
    const errorMessage = document.getElementById('errorMessage');
    const successMessage = document.getElementById('successMessage');

    let lastMessageId = 0;
    let pollingInterval = null;

    // Get initial last message ID
    function getLastMessageId() {
        const messages = messagesContainer.querySelectorAll('[data-message-id]');
        if (messages.length > 0) {
            lastMessageId = parseInt(messages[messages.length - 1].dataset.messageId);
        }
    }

    // Poll for new messages every 2 seconds
    function startPolling() {
        pollingInterval = setInterval(async () => {
            try {
                const response = await axios.get(`/api/chat/conversation/${receiverId}`);
                
                if (response.data && response.data.length > 0) {
                    const newMessages = response.data.filter(msg => msg.id > lastMessageId);
                    
                    newMessages.forEach(msg => {
                        if (msg.sender_id !== currentUserId) {
                            addMessageToUI(msg, true);
                            lastMessageId = msg.id;
                        }
                    });
                }
            } catch (error) {
                console.error('Polling error:', error);
            }
        }, 2000); // Poll every 2 seconds
    }

    // Send message
    messageForm.addEventListener('submit', async (e) => {
        e.preventDefault();
        
        const message = messageInput.value.trim();

        if (!message) {
            showError('Message cannot be empty');
            return;
        }

        // Disable button and show loading
        sendBtn.disabled = true;
        document.getElementById('sendBtnText').style.display = 'none';
        document.getElementById('sendBtnSpinner').style.display = 'inline-block';
        hideError();

        try {
            const response = await axios.post('/api/chat/send', {
                receiver_id: receiverId,
                message: message,
            });

            console.log('Message sent successfully:', response.data);

            // Add message to UI immediately
            addMessageToUI(response.data, false);
            lastMessageId = response.data.id;

            // Clear input
            messageInput.value = '';
            showSuccess('Message sent!');
            setTimeout(() => hideSuccess(), 2000);

        } catch (error) {
            console.error('Error sending message:', error);
            
            if (error.response?.data?.errors) {
                const errorText = Object.values(error.response.data.errors)[0][0];
                showError(errorText);
            } else if (error.response?.data?.error) {
                showError(error.response.data.error);
            } else {
                showError('Error sending message: ' + (error.message || 'Unknown error'));
            }
        } finally {
            // Re-enable button
            sendBtn.disabled = false;
            document.getElementById('sendBtnText').style.display = 'inline';
            document.getElementById('sendBtnSpinner').style.display = 'none';
            messageInput.focus();
        }
    });

    // Add message to UI
    function addMessageToUI(msg, isReceived) {
        // Remove placeholder if exists
        const placeholder = messagesContainer.querySelector('p');
        if (placeholder && placeholder.parentElement.classList.contains('text-center')) {
            messagesContainer.innerHTML = '';
        }

        const messageEl = document.createElement('div');
        messageEl.className = `mb-3 d-flex ${isReceived ? 'justify-content-start' : 'justify-content-end'}`;
        messageEl.setAttribute('data-message-id', msg.id);
        messageEl.style.animation = 'slideIn 0.3s ease';
        
        messageEl.innerHTML = `
            <div style="max-width: 70%; padding: 10px 15px; border-radius: 12px;
                       background: ${isReceived ? '#e9ecef' : '#007bff'};
                       color: ${isReceived ? '#333' : 'white'};">
                <div>${escapeHtml(msg.message)}</div>
                <small style="opacity: 0.7; margin-top: 5px; display: block;">
                    ${msg.formatted_time || new Date().toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' })}
                </small>
            </div>
        `;
        
        messagesContainer.appendChild(messageEl);
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
    }

    // Show error message
    function showError(message) {
        errorMessage.textContent = message;
        errorMessage.style.display = 'block';
    }

    // Hide error message
    function hideError() {
        errorMessage.style.display = 'none';
    }

    // Show success message
    function showSuccess(message) {
        successMessage.textContent = message;
        successMessage.style.display = 'block';
    }

    // Hide success message
    function hideSuccess() {
        successMessage.style.display = 'none';
    }

    // Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // Add CSS animation
    const style = document.createElement('style');
    style.textContent = `
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(10px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
    `;
    document.head.appendChild(style);

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        getLastMessageId();
        startPolling();
        messagesContainer.scrollTop = messagesContainer.scrollHeight;
        messageInput.focus();
    });

    // Cleanup on page unload
    window.addEventListener('beforeunload', () => {
        if (pollingInterval) {
            clearInterval(pollingInterval);
        }
    });
</script>

</x-navbar>