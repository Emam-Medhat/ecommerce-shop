
<style>
    /* Chat Sidebar Styles */
    .chat-sidebar {
        position: fixed;
        right: -400px;
        top: 0;
        width: 400px;
        height: 100vh;
        background: #fff;
        border-left: 1px solid #ddd;
        box-shadow: -2px 0 10px rgba(0, 0, 0, 0.1);
        transition: right 0.3s ease;
        z-index: 1030;
        display: flex;
        flex-direction: column;
        overflow: hidden;
    }

    .chat-sidebar.active {
        right: 0;
    }

    .chat-toggle-btn {
        position: fixed;
        right: 20px;
        bottom: 20px;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        border: none;
        cursor: pointer;
        font-size: 20px;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 1025;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.2);
        transition: background 0.3s ease;
    }

    .chat-toggle-btn:hover {
        background: #0056b3;
    }

    .chat-toggle-btn .badge {
        position: absolute;
        top: -5px;
        right: -5px;
        background: #dc3545;
        color: white;
        border-radius: 50%;
        width: 24px;
        height: 24px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 12px;
        font-weight: bold;
    }

    .chat-header {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: #f8f9fa;
    }

    .chat-header h5 {
        margin: 0;
        font-size: 18px;
        font-weight: 600;
    }

    .chat-close-btn {
        background: none;
        border: none;
        font-size: 20px;
        cursor: pointer;
        color: #666;
    }

    .chat-users-list {
        flex: 1;
        overflow-y: auto;
        padding: 10px 0;
    }

    .chat-user-item {
        padding: 12px 15px;
        cursor: pointer;
        border-bottom: 1px solid #f0f0f0;
        transition: background 0.2s;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }

    .chat-user-item:hover {
        background: #f8f9fa;
    }

    .chat-user-item.active {
        background: #e3f2fd;
        border-left: 3px solid #007bff;
    }

    .user-info {
        display: flex;
        align-items: center;
        flex: 1;
    }

    .user-avatar {
        width: 40px;
        height: 40px;
        border-radius: 50%;
        background: #007bff;
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        font-weight: bold;
        margin-right: 10px;
    }

    .user-status {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: #28a745;
        margin-left: 8px;
    }

    .user-status.offline {
        background: #ccc;
    }

    .chat-window {
        display: none;
        flex-direction: column;
        flex: 1;
        overflow: hidden;
        background: white;
    }

    .chat-window.active {
        display: flex;
    }

    .chat-messages {
        flex: 1;
        overflow-y: auto;
        padding: 15px;
        display: flex;
        flex-direction: column;
    }

    .message {
        margin-bottom: 12px;
        display: flex;
        animation: slideIn 0.3s ease;
    }

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

    .message.sent {
        justify-content: flex-end;
    }

    .message.received {
        justify-content: flex-start;
    }

    .message-content {
        max-width: 70%;
        padding: 10px 15px;
        border-radius: 12px;
        word-wrap: break-word;
    }

    .message.sent .message-content {
        background: #007bff;
        color: white;
        border-bottom-right-radius: 0;
    }

    .message.received .message-content {
        background: #e9ecef;
        color: #333;
        border-bottom-left-radius: 0;
    }

    .message-time {
        font-size: 12px;
        color: #999;
        margin-top: 4px;
    }

    .chat-input-area {
        padding: 15px;
        border-top: 1px solid #ddd;
        display: flex;
        gap: 8px;
    }

    .chat-input-area input {
        flex: 1;
        border: 1px solid #ddd;
        border-radius: 20px;
        padding: 10px 15px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.2s;
    }

    .chat-input-area input:focus {
        border-color: #007bff;
    }

    .chat-input-area button {
        background: #007bff;
        color: white;
        border: none;
        border-radius: 50%;
        width: 38px;
        height: 38px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: background 0.2s;
    }

    .chat-input-area button:hover {
        background: #0056b3;
    }

    .chat-placeholder {
        display: flex;
        align-items: center;
        justify-content: center;
        height: 100%;
        color: #999;
        text-align: center;
        padding: 20px;
    }

    .no-users {
        padding: 20px;
        text-align: center;
        color: #999;
        font-size: 14px;
    }

    @media (max-width: 768px) {
        .chat-sidebar {
            width: 100%;
            right: -100%;
        }
    }
</style>

<div class="chat-container">
    <!-- Chat Toggle Button -->
    <button class="chat-toggle-btn" id="chatToggle" title="Open Chat">
        💬
        <span class="badge" id="unreadBadge" style="display: none;">0</span>
    </button>

    <!-- Chat Sidebar -->
    <div class="chat-sidebar" id="chatSidebar">
        <!-- Header -->
        <div class="chat-header">
            <h5>Messages</h5>
            <button class="chat-close-btn" id="chatClose">✕</button>
        </div>

        <!-- Users List -->
        <div class="chat-users-list" id="usersList">
            <div class="no-users">Loading users...</div>
        </div>
    </div>

    <!-- Chat Window (appears in sidebar) -->
    <div class="chat-window" id="chatWindow" style="position: absolute; top: 0; left: 0; right: 0; bottom: 0; background: white; display: none; z-index: 1031;">
        <!-- Chat Header -->
        <div class="chat-header" style="display: flex; justify-content: space-between; align-items: center;">
            <div style="display: flex; align-items: center; flex: 1;">
                <button class="chat-close-btn" id="chatBackBtn" style="font-size: 18px; margin-right: 10px;">←</button>
                <h5 id="chatUserName" style="margin: 0;"></h5>
            </div>
        </div>

        <!-- Messages Area -->
        <div class="chat-messages" id="messagesContainer">
            <div class="chat-placeholder">Select a conversation to start</div>
        </div>

        <!-- Input Area -->
        <div class="chat-input-area">
            <input type="text" id="messageInput" placeholder="Type a message..." disabled>
            <button id="sendBtn" type="button" disabled title="Send Message">
                ➤
            </button>
        </div>
    </div>
</div>

<script>
    // Chat System JavaScript
    const chatState = {
        currentUserId: {{ Auth::id() }},
        selectedUserId: null,
        isWindowOpen: false,
        pusher: null,
        channel: null,
    };

    // Initialize Pusher
    function initializePusher() {
        if (typeof Pusher === 'undefined') {
            console.error('Pusher library not loaded');
            return;
        }

        chatState.pusher = new Pusher('{{ env("PUSHER_APP_KEY") }}', {
            cluster: '{{ env("PUSHER_APP_CLUSTER") }}',
            encrypted: true,
        });

        // Subscribe to user's private channel
        chatState.channel = chatState.pusher.subscribe(`chat.${chatState.currentUserId}`);
        chatState.channel.bind('message.sent', (data) => {
            handleIncomingMessage(data);
        });
    }

    // Handle incoming message from Pusher
    function handleIncomingMessage(data) {
        // If the message is for the currently open conversation, display it
        if (chatState.selectedUserId === data.sender_id || chatState.selectedUserId === data.receiver_id) {
            displayMessage(data, data.sender_id === chatState.currentUserId ? 'sent' : 'received');
        }

        // Update unread count
        updateUnreadCount();
    }

    // Display message in chat
    function displayMessage(msg, type) {
        const container = document.getElementById('messagesContainer');
        
        if (container.querySelector('.chat-placeholder')) {
            container.innerHTML = '';
        }

        const messageEl = document.createElement('div');
        messageEl.className = `message ${type}`;
        messageEl.innerHTML = `
            <div>
                <div class="message-content">${escapeHtml(msg.message)}</div>
                <div class="message-time">${msg.formatted_time}</div>
            </div>
        `;
        container.appendChild(messageEl);
        container.scrollTop = container.scrollHeight;
    }

    // Load users list
    async function loadUsers() {
        try {
            const response = await axios.get('/api/chat/users');
            const usersList = document.getElementById('usersList');
            
            if (response.data.length === 0) {
                usersList.innerHTML = '<div class="no-users">No users available</div>';
                return;
            }

            usersList.innerHTML = response.data.map(user => `
                <div class="chat-user-item" data-user-id="${user.id}" onclick="openChat(${user.id})">
                    <div class="user-info">
                        <div class="user-avatar">${user.name.charAt(0).toUpperCase()}</div>
                        <span>${escapeHtml(user.name)}</span>
                    </div>
                    <div class="user-status"></div>
                </div>
            `).join('');
        } catch (error) {
            console.error('Error loading users:', error);
            document.getElementById('usersList').innerHTML = '<div class="no-users">Error loading users</div>';
        }
    }

    // Open chat with user
    async function openChat(userId) {
        chatState.selectedUserId = userId;
        document.getElementById('chatWindow').style.display = 'flex';
        document.getElementById('usersList').style.display = 'none';
        
        // Update active user
        document.querySelectorAll('.chat-user-item').forEach(el => {
            el.classList.toggle('active', el.dataset.userId == userId);
        });

        const user = document.querySelector(`[data-user-id="${userId}"]`);
        const userName = user?.textContent.trim().split('\n')[0] || 'User';
        document.getElementById('chatUserName').textContent = userName;

        // Enable input
        document.getElementById('messageInput').disabled = false;
        document.getElementById('sendBtn').disabled = false;

        // Load conversation
        await loadConversation(userId);

        // Mark as read
        try {
            await axios.post(`/api/chat/mark-read/${userId}`);
            updateUnreadCount();
        } catch (error) {
            console.error('Error marking as read:', error);
        }
    }

    // Load conversation
    async function loadConversation(userId) {
        try {
            const response = await axios.get(`/api/chat/conversation/${userId}`);
            const container = document.getElementById('messagesContainer');
            container.innerHTML = '';

            if (response.data.length === 0) {
                container.innerHTML = '<div class="chat-placeholder">Start a conversation!</div>';
                return;
            }

            response.data.forEach(msg => {
                const type = msg.sender_id === chatState.currentUserId ? 'sent' : 'received';
                displayMessage(msg, type);
            });
        } catch (error) {
            console.error('Error loading conversation:', error);
            document.getElementById('messagesContainer').innerHTML = '<div class="chat-placeholder">Error loading conversation</div>';
        }
    }

    // Send message
    async function sendMessage() {
        const input = document.getElementById('messageInput');
        const message = input.value.trim();

        if (!message || !chatState.selectedUserId) return;

        try {
            const response = await axios.post('/api/chat/send', {
                receiver_id: chatState.selectedUserId,
                message: message,
            });

            input.value = '';
            displayMessage(response.data, 'sent');
        } catch (error) {
            if (error.response?.data?.errors) {
                alert(Object.values(error.response.data.errors)[0][0]);
            } else {
                alert('Error sending message');
            }
            console.error('Error sending message:', error);
        }
    }

    // Update unread message count
    async function updateUnreadCount() {
        try {
            const response = await axios.get('/api/chat/unread-count');
            const badge = document.getElementById('unreadBadge');
            
            if (response.data.unread_count > 0) {
                badge.textContent = response.data.unread_count;
                badge.style.display = 'flex';
            } else {
                badge.style.display = 'none';
            }
        } catch (error) {
            console.error('Error updating unread count:', error);
        }
    }

    // Utility: Escape HTML to prevent XSS
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    // UI Event Listeners
    document.getElementById('chatToggle').addEventListener('click', () => {
        document.getElementById('chatSidebar').classList.toggle('active');
        document.getElementById('usersList').style.display = 'block';
        document.getElementById('chatWindow').style.display = 'none';
    });

    document.getElementById('chatClose').addEventListener('click', () => {
        document.getElementById('chatSidebar').classList.remove('active');
    });

    document.getElementById('chatBackBtn').addEventListener('click', () => {
        document.getElementById('chatWindow').style.display = 'none';
        document.getElementById('usersList').style.display = 'block';
        chatState.selectedUserId = null;
    });

    document.getElementById('sendBtn').addEventListener('click', sendMessage);
    document.getElementById('messageInput').addEventListener('keypress', (e) => {
        if (e.key === 'Enter') sendMessage();
    });

    // Initialize on page load
    document.addEventListener('DOMContentLoaded', () => {
        initializePusher();
        loadUsers();
        updateUnreadCount();
        setInterval(updateUnreadCount, 30000); // Update every 30 seconds
    });
</script>

