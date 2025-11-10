<!-- Google Fonts & Icon CSS -->
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;600;700&family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">

<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.4/css/all.css" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

<link href="{{ asset('lib/animate/animate.min.css') }}" rel="stylesheet">
<link href="{{ asset('lib/owlcarousel/assets/owl.carousel.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
<link href="{{ asset('css/style.css') }}" rel="stylesheet">

<!-- CSRF Meta for AJAX -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<style>
    /* Floating Chat Button Styles (Improved) */
    .chat-toggle-btn {
        position: fixed;
        bottom: 25px;
        left: 25px;
        width: 60px;
        height: 60px;
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        border: none;
        border-radius: 50%;
        font-size: 24px;
        box-shadow: 0 8px 25px rgba(242, 139, 0, 0.3);
        z-index: 1050;
        cursor: pointer;
        transition: all 0.3s ease;
    }
    .chat-toggle-btn:hover {
        transform: scale(1.1) rotate(5deg);
        box-shadow: 0 12px 30px rgba(242, 139, 0, 0.4);
    }
    .chat-toggle-btn i {
        margin-top: 2px;
    }
    .chat-toggle-btn .badge {
        background: #dc3545;
        font-size: 10px;
        padding: 2px 5px;
    }

    /* Chat Box Styles (Much Better Design) */
    .chat-box {
        position: fixed;
        bottom: 95px;
        left: 25px;
        width: 420px;
        height: 550px;
        background: white;
        border-radius: 20px;
        box-shadow: 0 12px 40px rgba(0, 0, 0, 0.15);
        display: none;
        flex-direction: column;
        z-index: 1049;
        overflow: hidden;
        font-family: 'Open Sans', sans-serif;
        animation: slideUp 0.3s ease-out;
    }
    @keyframes slideUp {
        from { transform: translateY(20px); opacity: 0; }
        to { transform: translateY(0); opacity: 1; }
    }
    .chat-header {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        padding: 15px 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        font-weight: 600;
        font-size: 16px;
        box-shadow: 0 2px 10px rgba(242, 139, 0, 0.2);
    }
    .close-chat-btn {
        background: rgba(255, 255, 255, 0.2);
        border: none;
        color: white;
        font-size: 18px;
        cursor: pointer;
        padding: 8px;
        border-radius: 50%;
        transition: all 0.2s;
    }
    .close-chat-btn:hover {
        background: rgba(255, 255, 255, 0.3);
        transform: rotate(90deg);
    }
    .chat-body {
        display: flex;
        height: calc(100% - 50px);
    }
    .chat-sidebar {
        width: 120px;
        background: #f8f9fa;
        overflow:hidden;
        border-right: 1px solid #e9ecef;
        overflow-y: auto;
        padding: 15px 0;
    }
    .search-users {
        padding: 0 10px 10px;
        position: sticky;
        top: 0;
        background: #f8f9fa;
        z-index: 1;
    }
    .search-users input {
        width: 100%;
        padding: 8px 12px;
        border: 1px solid #dee2e6;
        border-radius: 20px;
        font-size: 12px;
        background: white;
    }
    .chat-area {
        flex: 1;
        display: flex;
        flex-direction: column;
        background: #f8f9fa;
    }
    .chat-header-inner {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        padding: 15px 20px;
        font-size: 14px;
        border-bottom: 1px solid #dee2e6;
        box-shadow: 0 2px 8px rgba(242, 139, 0, 0.1);
    }
    .messages-container {
        flex: 1;
        padding: 20px;
        overflow-y: auto;
        background: #f1f3f5;
    }
    .message-input-area {
        padding: 15px 20px;
        border-top: 1px solid #dee2e6;
        background: white;
    }
    .user-item {
        padding: 15px 10px;
        text-align: center;
        cursor: pointer;
        border-bottom: 1px solid #e9ecef;
        transition: all 0.3s ease;
        position: relative;
    }
    .user-item:hover, .user-item.active {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        transform: translateX(5px);
        box-shadow: 0 4px 12px rgba(242, 139, 0, 0.2);
    }
    .user-item:hover .user-name, .user-item.active .user-name {
        color: white;
    }
    .user-avatar {
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        display: flex;
        align-items: center;
        justify-content: center;
        margin: 0 auto 10px;
        font-weight: bold;
        font-size: 18px;
        box-shadow: 0 2px 8px rgba(242, 139, 0, 0.3);
        transition: transform 0.2s;
    }
    .user-item:hover .user-avatar, .user-item.active .user-avatar {
        transform: scale(1.05);
    }
    .user-name {
        font-size: 12px;
        color: #495057;
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        font-weight: 500;
    }
    .message-bubble {
        max-width: 80%;
        padding: 12px 16px;
        border-radius: 25px;
        margin-bottom: 12px;
        word-wrap: break-word;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        animation: messageSlide 0.3s ease-out;
    }
    @keyframes messageSlide {
        from { opacity: 0; transform: translateY(10px); }
        to { opacity: 1; transform: translateY(0); }
    }
    .message-sent {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
        margin-left: auto;
        border-bottom-right-radius: 5px;
    }
    .message-received {
        background: white;
        color: #333;
        border-bottom-left-radius: 5px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.05);
    }
    .message-time {
        font-size: 11px;
        opacity: 0.8;
        margin-top: 6px;
        text-align: right;
    }
    .error-msg, .success-msg {
        padding: 10px;
        margin-top: 8px;
        border-radius: 10px;
        font-size: 12px;
        text-align: center;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    .error-msg {
        background: #f8d7da;
        color: #721c24;
    }
    .success-msg {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        color: white;
    }
    #messageInput {
        border-radius: 25px;
        border: 1px solid #dee2e6;
        padding: 10px 15px;
        transition: border-color 0.2s;
    }
    #messageInput:focus {
        border-color: #f28b00;
        box-shadow: 0 0 0 0.2rem rgba(242, 139, 0, 0.25);
    }
    #sendBtn {
        background: linear-gradient(135deg, #f28b00, #e67e22);
        border: none;
        transition: all 0.2s;
    }
    #sendBtn:hover {
        transform: scale(1.05);
        box-shadow: 0 4px 12px rgba(242, 139, 0, 0.3);
    }
    #noUserSelected {
        color: #6c757d;
        font-size: 14px;
    }
    #noUserSelected i {
        opacity: 0.5;
    }
    /* Hide users when searching */
    .user-item.hidden {
        display: none;
    }
    /* Responsive for Mobile */
    @media (max-width: 576px) {
        .chat-box {
            width: calc(100vw - 50px);
            left: 25px;
            bottom: 25px;
            height: calc(100vh - 100px);
            border-radius: 15px;
        }
        .chat-sidebar {
            width: 90px;
        }
        .user-avatar {
            width: 40px;
            height: 40px;
            font-size: 16px;
        }
        .user-name {
            font-size: 11px;
        }
    }
</style>

<!-- Footer Start -->
<div class="container-fluid footer py-5 wow fadeIn" data-wow-delay="0.2s">
    <div class="container py-5">
        <div class="row g-4 rounded mb-5" style="background: rgba(255, 255, 255, .03);">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fas fa-map-marker-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Address</h4>
                        <p class="mb-2">123 Street New York.USA</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fas fa-envelope fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Mail Us</h4>
                        <p class="mb-2">info@example.com</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fa fa-phone-alt fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Telephone</h4>
                        <p class="mb-2">(+012) 3456 7890</p>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="rounded p-4">
                    <div class="rounded-circle bg-secondary d-flex align-items-center justify-content-center mb-4"
                        style="width: 70px; height: 70px;">
                        <i class="fab fa-firefox-browser fa-2x text-primary"></i>
                    </div>
                    <div>
                        <h4 class="text-white">Yoursite@ex.com</h4>
                        <p class="mb-2">(+012) 3456 7890</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row g-5">
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <div class="footer-item">
                        <h4 class="text-primary mb-4">Newsletter</h4>
                        <p class="text-white mb-3">Dolor amet sit justo amet elitr clita ipsum elitr est.Lorem ipsum
                            dolor sit amet, consectetur adipiscing elit consectetur adipiscing elit.</p>
                        <div class="position-relative mx-auto rounded-pill">
                            <input class="form-control rounded-pill w-100 py-3 ps-4 pe-5" type="text"
                                placeholder="Enter your email">
                            <button type="button"
                                class="btn btn-primary rounded-pill position-absolute top-0 end-0 py-2 mt-2 me-2">SignUp</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Customer Service</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Contact Us</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Returns</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Site Map</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Testimonials</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> My Account</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Unsubscribe Notification</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Information</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> About Us</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Delivery infomation</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Privacy Policy</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Terms & Conditions</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Warranty</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> FAQ</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Seller Login</a>
                </div>
            </div>
            <div class="col-md-6 col-lg-6 col-xl-3">
                <div class="footer-item d-flex flex-column">
                    <h4 class="text-primary mb-4">Extras</h4>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Brands</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Gift Vouchers</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Affiliates</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Wishlist</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Order History</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                    <a href="#" class=""><i class="fas fa-angle-right me-2"></i> Track Your Order</a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->

<!-- Copyright Start -->
<div class="container-fluid copyright py-4">
    <div class="container">
        <div class="row g-4 align-items-center">
            <div class="col-md-6 text-center text-md-start mb-md-0">
                <span class="text-white"><a href="#" class="border-bottom text-white"><i
                            class="fas fa-copyright text-light me-2"></i>Your Site Name</a>, All right
                    reserved.</span>
            </div>
            <div class="col-md-6 text-center text-md-end text-white">
                Designed By <a class="border-bottom text-white" href="https://htmlcodex.com">HTML Codex</a>.
                Distributed By <a class="border-bottom text-white" href="https://themewagon.com">ThemeWagon</a>
            </div>
        </div>
    </div>
</div>
<!-- Copyright End -->

<!-- Back to Top -->
<a href="#" class="btn btn-primary btn-lg-square back-to-top"><i class="fa fa-arrow-up"></i></a>

<!-- Floating Chat Button -->
<button class="chat-toggle-btn" id="chatToggleBtn">
    <i class="fas fa-comments"></i>
    <span class="badge bg-danger position-absolute top-0 start-100 translate-middle" id="unreadBadge" style="display: none;">0</span>
</button>

<!-- Chat Box -->
<div class="chat-box" id="chatBox">
    <div class="chat-header">
        <span>Live Chat</span>
        <button class="close-chat-btn" id="closeChatBtn"><i class="fas fa-times"></i></button>
    </div>
    <div class="chat-body">
        <!-- Sidebar Users -->
        <div class="chat-sidebar">
            <div class="search-users">
                <input type="text" id="userSearchInput" placeholder="Search users..." class="form-control form-control-sm rounded-pill">
            </div>
            <h6 class="text-center mb-3">Users</h6>
            <div id="chatUsersList">
                <!-- Users will load here -->
            </div>
        </div>
        <!-- Chat Area -->
        <div class="chat-area">
            <div class="chat-header-inner d-none" id="chatHeader">
                <strong id="selectedUserName"></strong>
            </div>
            <div id="messagesContainer" class="messages-container d-none">
                <!-- Messages here -->
            </div>
            <div class="message-input-area d-none" id="inputArea">
                <form id="messageForm" class="d-flex gap-2">
                    @csrf
                    <input type="hidden" id="receiverId" value="">
                    <input type="text" id="messageInput" class="form-control flex-grow-1 rounded-pill" placeholder="Type a message..." autocomplete="off">
                    <button type="submit" class="btn btn-primary rounded-pill px-4" id="sendBtn">
                        <i class="fas fa-paper-plane"></i>
                    </button>
                </form>
                <div id="errorMsg" class="error-msg d-none mt-2"></div>
                <div id="successMsg" class="success-msg d-none mt-2"></div>
            </div>
            <!-- Default No User Selected -->
            <div id="noUserSelected" class="d-flex flex-column justify-content-center align-items-center flex-grow-1 text-center p-4">
                <i class="fas fa-comments fa-3x text-muted mb-3"></i>
                <h6 class="text-muted">Select a user to start chatting</h6>
            </div>
        </div>
    </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{ asset('lib/wow/wow.min.js') }}"></script>
<script src="{{ asset('lib/owlcarousel/owl.carousel.min.js') }}"></script>
<script src="{{ asset('js/main.js') }}"></script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/axios/1.6.0/axios.min.js"></script>
<script>
    const currentUserId = {{ Auth::id() ?? 0 }};
    let currentReceiverId = null;
    let lastMessageId = 0;
    let pollingInterval = null;
    let usersLoaded = false;
    let allUsers = []; // To store all users for search

    // Setup CSRF for Axios
    let token = document.querySelector('meta[name="csrf-token"]');
    if (token) {
        window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
    }

    const chatToggleBtn = document.getElementById('chatToggleBtn');
    const chatBox = document.getElementById('chatBox');
    const closeChatBtn = document.getElementById('closeChatBtn');
    const noUserSelected = document.getElementById('noUserSelected');
    const userSearchInput = document.getElementById('userSearchInput');

    // Show/Hide chat box
    chatToggleBtn.addEventListener('click', () => {
        const isVisible = chatBox.style.display === 'flex';
        chatBox.style.display = isVisible ? 'none' : 'flex';
        if (!isVisible && !usersLoaded) {
            loadUsers();
            loadUnreadCount(); // Load unread badge
        }
    });
    closeChatBtn.addEventListener('click', () => {
        closeChat();
    });

    // Close chat cleanup
    function closeChat() {
        chatBox.style.display = 'none';
        if (pollingInterval) {
            clearInterval(pollingInterval);
            pollingInterval = null;
        }
        currentReceiverId = null;
        lastMessageId = 0;
        document.getElementById('chatHeader').classList.add('d-none');
        document.getElementById('messagesContainer').classList.add('d-none');
        document.getElementById('inputArea').classList.add('d-none');
        document.getElementById('messagesContainer').innerHTML = '';
        noUserSelected.classList.remove('d-none');
        // Reset active user
        document.querySelectorAll('.user-item').forEach(item => item.classList.remove('active'));
        userSearchInput.value = ''; // Clear search
        filterUsers(''); // Show all
    }

    // Load users (all logged in except self)
    async function loadUsers() {
        try {
            const response = await axios.get('/api/chat/users');
            allUsers = response.data;
            renderUsers(allUsers);
            usersLoaded = true;
        } catch (error) {
            console.error('Error loading users:', error);
            document.getElementById('chatUsersList').innerHTML = '<p class="text-center text-muted p-3">Error loading users</p>';
        }
    }

    // Render users
    function renderUsers(users) {
        const usersList = document.getElementById('chatUsersList');
        usersList.innerHTML = '';
        if (users.length === 0) {
            usersList.innerHTML = '<p class="text-center text-muted p-3">No users found</p>';
            return;
        }
        users.forEach(user => {
            const userItem = document.createElement('div');
            userItem.className = 'user-item';
            userItem.dataset.userId = user.id;
            userItem.dataset.userName = user.name;
            userItem.innerHTML = `
                <div class="user-avatar">${user.name.charAt(0).toUpperCase()}</div>
                <div class="user-name">${user.name}</div>
            `;
            userItem.addEventListener('click', (e) => selectUser(user.id, user.name, e));
            usersList.appendChild(userItem);
        });
    }

    // Filter users on search
    userSearchInput.addEventListener('input', (e) => {
        const query = e.target.value.toLowerCase();
        const filtered = allUsers.filter(user => user.name.toLowerCase().includes(query));
        renderUsers(filtered);
    });

    // Select user and load conversation
    function selectUser(userId, userName, event) {
        currentReceiverId = userId;
        document.getElementById('selectedUserName').textContent = userName;
        document.getElementById('receiverId').value = userId;
        document.getElementById('chatHeader').classList.remove('d-none');
        document.getElementById('messagesContainer').classList.remove('d-none');
        document.getElementById('inputArea').classList.remove('d-none');
        noUserSelected.classList.add('d-none');

        // Update active class
        document.querySelectorAll('.user-item').forEach(item => item.classList.remove('active'));
        event.currentTarget.classList.add('active');

        loadConversation(userId);
    }

    // Load conversation messages
    async function loadConversation(userId) {
        try {
            const response = await axios.get(`/api/chat/conversation/${userId}`);
            const messages = response.data;
            const msgContainer = document.getElementById('messagesContainer');
            msgContainer.innerHTML = '';
            if (messages.length > 0) {
                messages.forEach(msg => {
                    addMessageToUI(msg, msgContainer);
                    lastMessageId = Math.max(lastMessageId, msg.id);
                });
            } else {
                msgContainer.innerHTML = '<div class="text-center text-muted p-4">No messages yet. Start the conversation!</div>';
            }
            msgContainer.scrollTop = msgContainer.scrollHeight;
        } catch (error) {
            console.error('Error loading conversation:', error);
            document.getElementById('messagesContainer').innerHTML = '<div class="alert alert-danger text-center m-3">Error loading conversation</div>';
        }
        setupMessageForm();
        setupPolling();
    }

    // Add message to UI (like previous chat)
    function addMessageToUI(msg, container) {
        const isReceived = msg.sender_id !== currentUserId;
        const messageEl = document.createElement('div');
        messageEl.className = `d-flex ${isReceived ? 'justify-content-start' : 'justify-content-end' } mb-3`;
        messageEl.innerHTML = `
            <div class="message-bubble ${isReceived ? 'message-received' : 'message-sent'}">
                <div>${escapeHtml(msg.message)}</div>
                <div class="message-time">${msg.formatted_time}</div>
            </div>
        `;
        container.appendChild(messageEl);
        container.scrollTop = container.scrollHeight;
    }

    // Setup message form (like previous)
    function setupMessageForm() {
        const form = document.getElementById('messageForm');
        const input = document.getElementById('messageInput');
        const sendBtn = document.getElementById('sendBtn');
        const errorMsg = document.getElementById('errorMsg');
        const successMsg = document.getElementById('successMsg');

        form.onsubmit = async (e) => {
            e.preventDefault();
            const message = input.value.trim();
            if (!message) return;

            // Show loading
            sendBtn.innerHTML = '<span class="spinner-border spinner-border-sm me-1" role="status"></span><i class="fas fa-paper-plane"></i>';
            sendBtn.disabled = true;
            hideMessages(errorMsg, successMsg);

            try {
                const response = await axios.post('/api/chat/send', {
                    receiver_id: currentReceiverId,
                    message: message
                });
                addMessageToUI(response.data, document.getElementById('messagesContainer'));
                input.value = '';
                showMessage(successMsg, 'Message sent!', 2000);
            } catch (error) {
                console.error('Error sending message:', error);
                let errText = 'Error sending message';
                if (error.response?.data?.error) errText = error.response.data.error;
                else if (error.response?.data?.errors) errText = Object.values(error.response.data.errors)[0][0];
                showMessage(errorMsg, errText, 5000);
            } finally {
                sendBtn.innerHTML = '<i class="fas fa-paper-plane"></i>';
                sendBtn.disabled = false;
                input.focus();
            }
        };
    }

    // Setup polling (like previous)
    function setupPolling() {
        if (pollingInterval) clearInterval(pollingInterval);
        pollingInterval = setInterval(async () => {
            if (!currentReceiverId) return;
            try {
                const response = await axios.get(`/api/chat/conversation/${currentReceiverId}`);
                const newMessages = response.data.filter(msg => msg.id > lastMessageId);
                newMessages.forEach(msg => {
                    if (msg.sender_id !== currentUserId) {
                        addMessageToUI(msg, document.getElementById('messagesContainer'));
                    }
                    lastMessageId = msg.id;
                });
            } catch (error) {
                console.error('Polling error:', error);
            }
        }, 2000);
    }

    // Load unread count for badge
    async function loadUnreadCount() {
        try {
            const response = await axios.get('/api/chat/unread-count');
            const count = response.data.unread_count;
            const badge = document.getElementById('unreadBadge');
            if (count > 0) {
                badge.textContent = count > 99 ? '99+' : count;
                badge.style.display = 'block';
            } else {
                badge.style.display = 'none';
            }
        } catch (error) {
            console.error('Error loading unread count:', error);
        }
    }

    // Utility functions
    function escapeHtml(text) {
        const div = document.createElement('div');
        div.textContent = text;
        return div.innerHTML;
    }

    function showMessage(el, msg, duration = 3000) {
        el.textContent = msg;
        el.classList.remove('d-none');
        setTimeout(() => el.classList.add('d-none'), duration);
    }

    function hideMessages(errorEl, successEl) {
        errorEl.classList.add('d-none');
        successEl.classList.add('d-none');
    }

    // Update unread count periodically
    setInterval(loadUnreadCount, 30000); // Every 30 seconds
</script>