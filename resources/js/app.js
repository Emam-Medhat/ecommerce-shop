import Echo from 'laravel-echo';
import Pusher from 'pusher-js';
import axios from 'axios';

window.Pusher = Pusher;

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'YOUR_PUSHER_KEY',
    cluster: 'YOUR_PUSHER_CLUSTER',
    wsHost: '127.0.0.1',
    wsPort: 6001,
    forceTLS: false,
    disableStats: true,
});

axios.defaults.headers.common['X-CSRF-TOKEN'] = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

document.addEventListener('DOMContentLoaded', function() {
    const chatBox = document.getElementById('chat-box');
    if (!chatBox) return; // إذا لم يكن هناك chat box، لا تفعل شيء
    
    const messagesDiv = document.getElementById('messages');
    const messageInput = document.getElementById('message-input');
    const sendBtn = document.getElementById('send-btn');
    const openChatBtn = document.getElementById('open-chat-btn');
    const closeChatBtn = document.getElementById('close-chat-btn');
    
    if (!messagesDiv || !messageInput || !sendBtn || !openChatBtn || !closeChatBtn) return;
    
    const productId = chatBox.dataset.product;
    const userId = parseInt(chatBox.dataset.userId) || null;

    function fetchMessages() {
        axios.get(`/products/${productId}/messages`)
            .then(res => {
                messagesDiv.innerHTML = '';
                if (res.data && res.data.length > 0) {
                    res.data.forEach(m => {
                        const sender = m.sender_id == userId ? 'أنا' : 'البائع';
                        const messageDiv = document.createElement('div');
                        messageDiv.className = sender === 'أنا' ? 'text-end mb-2' : 'text-start mb-2';
                        messageDiv.innerHTML = `<strong>${sender}:</strong> ${m.message}`;
                        messagesDiv.appendChild(messageDiv);
                    });
                } else {
                    messagesDiv.innerHTML = '<p class="text-muted text-center">لا توجد رسائل بعد</p>';
                }
                messagesDiv.scrollTop = messagesDiv.scrollHeight;
            })
            .catch(err => {
                console.error('Error fetching messages:', err);
                messagesDiv.innerHTML = '<p class="text-danger text-center">حدث خطأ في تحميل الرسائل</p>';
            });
    }

    if (openChatBtn) {
        openChatBtn.addEventListener('click', () => {
            const isVisible = chatBox.style.display === 'block';
            chatBox.style.display = isVisible ? 'none' : 'block';
            if (!isVisible) {
                fetchMessages();
            }
        });
    }

    if (closeChatBtn) {
        closeChatBtn.addEventListener('click', () => {
            chatBox.style.display = 'none';
        });
    }

    if (sendBtn && messageInput) {
        sendBtn.addEventListener('click', () => {
            const msg = messageInput.value.trim();
            if(!msg) return;

            axios.post('/chat/send', {
                product_id: productId,
                message: msg
            })
            .then(res => {
                messageInput.value = '';
                fetchMessages();
            })
            .catch(err => {
                console.error('Error sending message:', err);
                if(err.response && err.response.status === 401){
                    alert('يجب تسجيل الدخول أولاً لإرسال الرسائل');
                } else {
                    alert('حدث خطأ أثناء إرسال الرسالة');
                }
            });
        });
        
        // إرسال الرسالة عند الضغط على Enter
        messageInput.addEventListener('keypress', (e) => {
            if (e.key === 'Enter') {
                sendBtn.click();
            }
        });
    }

    // الاستماع للرسائل الجديدة عبر Pusher
    if (window.Echo && productId) {
        window.Echo.channel(`product-chat.${productId}`)
            .listen('MessageSent', (e) => {
                fetchMessages();
            });
    }
});
