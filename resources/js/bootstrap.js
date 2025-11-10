import Echo from 'laravel-echo';
import Pusher from 'pusher-js';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY || 'local', // استخدم من .env
    cluster: process.env.MIX_PUSHER_APP_CLUSTER || 'mt1',
    wsHost: '127.0.0.1',
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});

// في الـ HTML، أضف هذا الكود:
document.addEventListener('DOMContentLoaded', function() {
    const openChatBtn = document.getElementById('open-chat-btn');
    const closeChatBtn = document.getElementById('close-chat-btn');
    const chatBox = document.getElementById('chat-box');
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('message-input');
    const sendBtn = document.getElementById('send-btn');
    const productId = chatBox.dataset.product;

    function fetchMessages() {
        axios.get(`/products/${productId}/messages`)
            .then(res => {
                messagesDiv.innerHTML = '';
                res.data.forEach(m => {
                    const sender = m.sender_id === parseInt('{{ auth()->id() }}') ? 'أنا' : 'البائع';
                    messagesDiv.innerHTML += `<p><b>${sender}:</b> ${m.message}</p>`;
                });
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            });
    }

    openChatBtn.addEventListener('click', () => {
        chatBox.style.display = chatBox.style.display === 'block' ? 'none' : 'block';
        if (chatBox.style.display === 'block') fetchMessages();
    });

    closeChatBtn.addEventListener('click', () => chatBox.style.display = 'none');

    sendBtn.addEventListener('click', () => {
        const msg = messageInput.value.trim();
        if (!msg) return;
        axios.post(`/products/${productId}/messages`, { message: msg })
            .then(res => {
                messageInput.value = '';
                fetchMessages(); // أو لا تحتاج إذا كان الـ broadcast يعمل
            })
            .catch(err => {
                if (err.response && err.response.status === 401) {
                    alert('يجب تسجيل الدخول أولاً لإرسال الرسائل');
                }
            });
    });

    // الاستماع للرسائل الجديدة
    window.Echo.private(`chat.${productId}`)
        .listen('MessageSent', (e) => {
            fetchMessages(); // أو أضف الرسالة مباشرة
        });
});