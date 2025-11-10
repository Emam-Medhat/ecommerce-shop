import Echo from 'laravel-echo';
window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'YOUR_PUSHER_KEY',
    cluster: 'YOUR_PUSHER_CLUSTER',
    forceTLS: true
});

const productId = document.getElementById('chat-box').dataset.product;

window.Echo.channel('product-chat.' + productId)
    .listen('MessageSent', (e) => {
        const div = document.createElement('div');
        div.textContent = `Seller: ${e.message.message}`;
        div.classList.add('text-start', 'mb-1');
        document.getElementById('messages').appendChild(div);
        document.getElementById('messages').scrollTop = document.getElementById('messages').scrollHeight;
    });
