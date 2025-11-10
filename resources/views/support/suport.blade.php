<x-navbar title="suport page">
<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>الدعم الفني - متجرنا</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        html {
            scroll-behavior: smooth;
        }

        body {
            direction:ltr ;
            font-family: 'Cairo', sans-serif;
            color: #333;
            line-height: 1.6;
            background: #fff;
        }

        .container {
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 20px;
        }

        /* ======================== */
        /* HEADER SECTION */
        /* ======================== */
        .support-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 100px 20px;
            text-align: center;
            position: relative;
            overflow: hidden;
        }

        .support-header::before {
            content: '';
            position: absolute;
            top: -50%;
            right: -50%;
            width: 500px;
            height: 500px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 50%;
        }

        .support-header h1 {
            font-size: 3rem;
            margin-bottom: 15px;
            position: relative;
            z-index: 1;
            animation: slideDown 0.8s ease-out;
        }

        .support-header p {
            font-size: 1.2rem;
            opacity: 0.9;
            position: relative;
            z-index: 1;
            animation: fadeIn 0.8s ease-out 0.2s both;
        }

        /* ======================== */
        /* ANIMATIONS */
        /* ======================== */
        @keyframes slideDown {
            from {
                opacity: 0;
                transform: translateY(-30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        /* ======================== */
        /* QUICK CONTACT SECTION */
        /* ======================== */
        .quick-contact {
            background: white;
            padding: 60px 20px;
            margin: -40px 20px 80px;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.1);
            position: relative;
            z-index: 2;
        }

        .quick-contact-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
            gap: 30px;
        }

        .contact-card {
            text-align: center;
            padding: 35px;
            border-radius: 12px;
            transition: all 0.3s ease;
            background: #f9f9f9;
            animation: slideUp 0.6s ease-out both;
            border: 2px solid transparent;
        }

        .contact-card:nth-child(1) { animation-delay: 0.1s; }
        .contact-card:nth-child(2) { animation-delay: 0.2s; }
        .contact-card:nth-child(3) { animation-delay: 0.3s; }

        .contact-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
            border-color: #f28b00;
        }

        .contact-card i {
            font-size: 2.8rem;
            color: #f28b00;
            margin-bottom: 20px;
            display: inline-block;
        }

        .contact-card h3 {
            color: #333;
            margin-bottom: 12px;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .contact-card p {
            color: #666;
            font-size: 0.95rem;
            margin-bottom: 15px;
        }

        .contact-card a {
            color: #f28b00;
            text-decoration: none;
            font-weight: 600;
            display: inline-block;
            transition: all 0.3s ease;
            padding: 8px 0;
            border-bottom: 2px solid transparent;
        }

        .contact-card a:hover {
            color: #764ba2;
            border-bottom-color: #764ba2;
        }

        /* ======================== */
        /* SECTION TITLE */
        /* ======================== */
        .section-title {
            text-align: center;
            margin-bottom: 60px;
        }

        .section-title h2 {
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 15px;
            font-weight: 700;
        }

        .section-title .underline {
            width: 80px;
            height: 4px;
            background: linear-gradient(90deg, #f28b00, #ff7f00);
            margin: 0 auto;
            border-radius: 2px;
        }

        /* ======================== */
        /* FAQ SECTION */
        /* ======================== */
        .faq-section {
            padding: 80px 20px;
            background: #f8f9fa;
        }

        .faq-container {
            max-width: 900px;
            margin: 0 auto;
        }

        .faq-item {
            background: white;
            margin-bottom: 20px;
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.05);
            animation: fadeInUp 0.6s ease-out;
            transition: all 0.3s ease;
        }

        .faq-item:hover {
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
        }

        .faq-header {
            padding: 25px;
            background: white;
            cursor: pointer;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: all 0.3s ease;
            border-right: 4px solid #f28b00;
        }

        .faq-header:hover {
            background: #f8f9fa;
        }

        .faq-header h3 {
            color: #333;
            font-size: 1.1rem;
            margin: 0;
            flex: 1;
            font-weight: 600;
        }

        .faq-icon {
            color: #f28b00;
            font-size: 1.3rem;
            transition: all 0.3s ease;
            min-width: 30px;
            text-align: center;
        }

        .faq-item.active .faq-icon {
            transform: rotate(180deg);
            color: #764ba2;
        }

        .faq-content {
            max-height: 0;
            overflow: hidden;
            transition: max-height 0.3s ease;
            padding: 0 25px;
        }

        .faq-item.active .faq-content {
            max-height: 500px;
            padding: 25px;
        }

        .faq-content p {
            color: #666;
            line-height: 1.8;
            font-size: 0.95rem;
        }

        /* ======================== */
        /* STATS SECTION */
        /* ======================== */
        .stats-section {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 80px 20px;
            color: white;
        }

        .stats-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
            gap: 30px;
        }

        .stat-card {
            text-align: center;
            padding: 40px;
            background: rgba(255, 255, 255, 0.1);
            border-radius: 12px;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
            transition: all 0.3s ease;
            animation: slideUp 0.6s ease-out both;
        }

        .stat-card:nth-child(1) { animation-delay: 0.1s; }
        .stat-card:nth-child(2) { animation-delay: 0.2s; }
        .stat-card:nth-child(3) { animation-delay: 0.3s; }
        .stat-card:nth-child(4) { animation-delay: 0.4s; }

        .stat-card:hover {
            transform: translateY(-10px);
            background: rgba(255, 255, 255, 0.15);
        }

        .stat-number {
            font-size: 2.5rem;
            font-weight: 700;
            margin-bottom: 10px;
        }

        .stat-label {
            font-size: 1rem;
            opacity: 0.9;
            margin-bottom: 15px;
        }

        .stat-icon {
            font-size: 2rem;
            opacity: 0.8;
        }

        /* ======================== */
        /* SERVICES SECTION */
        /* ======================== */
        .services-section {
            padding: 80px 20px;
            background: white;
        }

        .services-grid {
            display: grid;
            grid-template-columns: repeat(auto-fit, minmax(280px, 1fr));
            gap: 35px;
        }

        .service-card {
            background: white;
            padding: 40px;
            border-radius: 12px;
            box-shadow: 0 5px 20px rgba(0, 0, 0, 0.08);
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            animation: fadeInUp 0.6s ease-out;
        }

        .service-card::before {
            content: '';
            position: absolute;
            top: 0;
            right: 0;
            width: 4px;
            height: 100%;
            background: #f28b00;
            transform: scaleY(0);
            transition: all 0.3s ease;
            transform-origin: top;
        }

        .service-card:hover::before {
            transform: scaleY(1);
        }

        .service-card:hover {
            transform: translateY(-10px);
            box-shadow: 0 15px 40px rgba(0, 0, 0, 0.15);
        }

        .service-icon {
            width: 70px;
            height: 70px;
            background: linear-gradient(135deg, #f28b00 0%, #ff7f00 100%);
            border-radius: 12px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 2rem;
            margin-bottom: 25px;
        }

        .service-card h3 {
            color: #333;
            margin-bottom: 15px;
            font-size: 1.3rem;
            font-weight: 700;
        }

        .service-card p {
            color: #666;
            margin-bottom: 25px;
            line-height: 1.6;
            font-size: 0.95rem;
        }

        .service-card ul {
            list-style: none;
        }

        .service-card li {
            color: #666;
            margin-bottom: 12px;
            display: flex;
            align-items: center;
            font-size: 0.95rem;
        }

        .service-card li i {
            color: #f28b00;
            margin-left: 12px;
            font-size: 0.8rem;
            background: #f0f0f0;
            width: 20px;
            height: 20px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            flex-shrink: 0;
        }

        /* ======================== */
        /* CHAT WIDGET */
        /* ======================== */
        .chat-widget {
            position: fixed;
            bottom: 30px;
            left: 30px;
            display: none;
            flex-direction: column;
            z-index: 999;
        }

        .chat-widget.show {
            display: flex;
        }

        .chat-window {
            width: 350px;
            height: 500px;
            background: white;
            border-radius: 12px;
            box-shadow: 0 10px 40px rgba(0, 0, 0, 0.2);
            display: flex;
            flex-direction: column;
            margin-bottom: 15px;
            animation: slideUp 0.3s ease-out;
        }

        .chat-header {
            background: linear-gradient(135deg, #f28b00 0%, #ff7f00 100%);
            color: white;
            padding: 20px;
            border-radius: 12px 12px 0 0;
            display: flex;
            justify-content: space-between;
            align-items: center;
            font-weight: 600;
        }

        .chat-close {
            cursor: pointer;
            font-size: 1.5rem;
            transition: all 0.3s ease;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .chat-close:hover {
            transform: rotate(90deg);
        }

        .chat-messages {
            flex: 1;
            overflow-y: auto;
            padding: 20px;
            background: #f9f9f9;
        }

        .message {
            margin-bottom: 12px;
            padding: 12px 15px;
            border-radius: 8px;
            max-width: 85%;
            word-wrap: break-word;
            font-size: 0.95rem;
        }

        .message.bot {
            background: white;
            margin-right: auto;
            border: 1px solid #e0e0e0;
            color: #333;
        }

        .message.user {
            background: #f28b00;
            color: white;
            margin-left: auto;
            text-align: right;
        }

        .chat-input {
            padding: 15px;
            border-top: 1px solid #e0e0e0;
            display: flex;
            gap: 10px;
            background: white;
            border-radius: 0 0 12px 12px;
        }

        .chat-input input {
            flex: 1;
            padding: 10px 15px;
            border: 1px solid #e0e0e0;
            border-radius: 6px;
            font-family: 'Cairo', sans-serif;
            font-size: 0.95rem;
            transition: all 0.3s ease;
        }

        .chat-input input:focus {
            outline: none;
            border-color: #f28b00;
            box-shadow: 0 0 0 3px rgba(242, 139, 0, 0.1);
        }

        .chat-input button {
            background: #f28b00;
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-size: 1rem;
        }

        .chat-input button:hover {
            background: #ff7f00;
            transform: scale(1.05);
        }

        .chat-toggle {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, #f28b00 0%, #ff7f00 100%);
            border: none;
            border-radius: 50%;
            color: white;
            font-size: 1.5rem;
            cursor: pointer;
            box-shadow: 0 5px 20px rgba(242, 139, 0, 0.4);
            transition: all 0.3s ease;
        }

        .chat-toggle:hover {
            transform: scale(1.1);
            box-shadow: 0 8px 30px rgba(242, 139, 0, 0.5);
        }

        /* ======================== */
        /* RESPONSIVE */
        /* ======================== */
        @media (max-width: 768px) {
            .support-header {
                padding: 60px 20px;
            }

            .support-header h1 {
                font-size: 2rem;
            }

            .support-header p {
                font-size: 1rem;
            }

            .quick-contact {
                margin: -30px 0 60px;
                padding: 40px 20px;
            }

            .quick-contact-grid {
                grid-template-columns: 1fr;
                gap: 20px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 20px;
            }

            .stat-number {
                font-size: 1.8rem;
            }

            .stat-card {
                padding: 25px;
            }

            .services-grid {
                grid-template-columns: 1fr;
                gap: 25px;
            }

            .section-title h2 {
                font-size: 1.8rem;
            }

            .faq-section {
                padding: 60px 20px;
            }

            .services-section {
                padding: 60px 20px;
            }

            .stats-section {
                padding: 60px 20px;
            }

            .chat-widget {
                left: 15px;
                bottom: 15px;
            }

            .chat-window {
                width: calc(100vw - 30px);
                height: 400px;
            }
        }

        @media (max-width: 480px) {
            .support-header h1 {
                font-size: 1.5rem;
            }

            .section-title h2 {
                font-size: 1.5rem;
            }

            .contact-card {
                padding: 25px;
            }

            .stat-card {
                padding: 20px;
            }

            .stat-number {
                font-size: 1.5rem;
            }

            .service-card {
                padding: 25px;
            }

            .stats-grid {
                grid-template-columns: repeat(2, 1fr);
                gap: 15px;
            }
        }
    </style>
</head>
<body>
    <!-- Header -->
    <div class="support-header">
        <div class="container">
            <h1>🎯 خدمة الدعم الفني</h1>
            <p>نحن هنا لمساعدتك 24/7</p>
        </div>
    </div>

    <!-- Quick Contact -->
    <div class="container">
        <div class="quick-contact">
            <div class="quick-contact-grid">
                <div class="contact-card">
                    <i class="fas fa-headset"></i>
                    <h3>اتصل بنا</h3>
                    <p>تحدث مع فريقنا مباشرة</p>
                    <a href="tel:+201234567890">+20 123 456 7890</a>
                </div>
                <div class="contact-card">
                    <i class="fas fa-envelope"></i>
                    <h3>البريد الإلكتروني</h3>
                    <p>أرسل لنا رسالة</p>
                    <a href="mailto:support@electro.com">support@electro.com</a>
                </div>
                <div class="contact-card">
                    <i class="fas fa-comments"></i>
                    <h3>الدردشة الحية</h3>
                    <p>تحدث معنا فوراً</p>
                    <a href="#" onclick="toggleChat(event)">ابدأ الدردشة</a>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Section -->
    <div class="faq-section">
        <div class="container">
            <div class="section-title">
                <h2>الأسئلة الشائعة</h2>
                <div class="underline"></div>
            </div>

            <div class="faq-container">
                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3>كيف أتتبع طلبي؟</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p>يمكنك تتبع طلبك من خلال لوحة التحكم الخاصة بك. ما عليك سوى تسجيل الدخول إلى حسابك والذهاب إلى قسم "طلباتي" حيث ستجد حالة كل طلب وتفاصيل الشحن.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3>ما هي سياسة الاسترجاع؟</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p>نحن نقدم سياسة استرجاع بدون أسئلة لمدة 30 يوماً من تاريخ الشراء. إذا كنت غير راضٍ عن المنتج لأي سبب كان، يمكنك إرساله إلينا بحالة جيدة للحصول على استرجاع كامل.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3>كم يستغرق الشحن؟</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p>عادة يستغرق الشحن من 3 إلى 5 أيام عمل داخل المدينة، و 5 إلى 7 أيام للمحافظات الأخرى. شحن مجاني للطلبات التي تزيد عن 500 جنيه.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3>هل تقدمون ضمان على المنتجات؟</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p>نعم، جميع منتجاتنا مغطاة بضمان الشركة المصنعة. نحن نوفر دعماً فنياً مجانياً طوال فترة الضمان للمساعدة في أي مشاكل قد تواجهها.</p>
                    </div>
                </div>

                <div class="faq-item">
                    <div class="faq-header" onclick="toggleFaq(this)">
                        <h3>كيف يمكنني تغيير كلمة المرور؟</h3>
                        <i class="fas fa-chevron-down faq-icon"></i>
                    </div>
                    <div class="faq-content">
                        <p>اذهب إلى إعدادات الحساب وانقر على "تغيير كلمة المرور". سيُطلب منك إدخال كلمة المرور الحالية ثم كلمة المرور الجديدة مرتين للتأكيد.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Stats Section -->
    <div class="stats-section">
        <div class="container">
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-number">+50,000</div>
                    <div class="stat-label">عميل سعيد</div>
                    <div class="stat-icon"><i class="fas fa-smile"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">24/7</div>
                    <div class="stat-label">دعم فني متاح</div>
                    <div class="stat-icon"><i class="fas fa-clock"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">99.9%</div>
                    <div class="stat-label">معدل رضا العملاء</div>
                    <div class="stat-icon"><i class="fas fa-star"></i></div>
                </div>
                <div class="stat-card">
                    <div class="stat-number">5 دقائق</div>
                    <div class="stat-label">متوسط وقت الرد</div>
                    <div class="stat-icon"><i class="fas fa-bolt"></i></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Services Section -->
    <div class="services-section">
        <div class="container">
            <div class="section-title">
                <h2>خدمات الدعم الخاصة بنا</h2>
                <div class="underline"></div>
            </div>

            <div class="services-grid">
                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-tools"></i></div>
                    <h3>الدعم الفني</h3>
                    <p>فريق متخصص جاهز لحل أي مشكلة تقنية قد تواجهها مع منتجاتنا في أسرع وقت.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> حل مشاكل المنتجات</li>
                        <li><i class="fas fa-check"></i> تثبيت وإعدادات</li>
                        <li><i class="fas fa-check"></i> دليل الاستخدام</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-box"></i></div>
                    <h3>خدمة الشحن والتسليم</h3>
                    <p>تتبع شامل لطلبك من لحظة المغادرة حتى الوصول إلى باب منزلك بأمان تام.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> شحن سريع وآمن</li>
                        <li><i class="fas fa-check"></i> تتبع مباشر</li>
                        <li><i class="fas fa-check"></i> ضمان التسليم</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-undo"></i></div>
                    <h3>الاسترجاع والاستبدال</h3>
                    <p>عملية استرجاع سهلة وسريعة بدون تعقيدات خلال 30 يوم من الشراء.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> استرجاع مجاني</li>
                        <li><i class="fas fa-check"></i> استبدال فوري</li>
                        <li><i class="fas fa-check"></i> لا توجد أسئلة</li>
                    </ul>
                </div>

                <div class="service-card">
                    <div class="service-icon"><i class="fas fa-shield-alt"></i></div>
                    <h3>الضمان والحماية</h3>
                    <p>حماية شاملة لكل منتج مع ضمان الشركة المصنعة وحماية إضافية من متجرنا.</p>
                    <ul>
                        <li><i class="fas fa-check"></i> ضمان الشركة</li>
                        <li><i class="fas fa-check"></i> حماية إضافية</li>
                        <li><i class="fas fa-check"></i> تغطية كاملة</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Chat Widget -->
    <div class="chat-widget" id="chatWidget">
        <div class="chat-window">
            <div class="chat-header">
                <h3>💬 المساعدة الفورية</h3>
                <div class="chat-close" onclick="toggleChat(event)">✕</div>
            </div>
            <div class="chat-messages" id="chatMessages">
                <div class="message bot">مرحباً! كيف يمكننا مساعدتك اليوم؟</div>
            </div>
            <div class="chat-input">
                <input type="text" id="chatInput" placeholder="اكتب رسالتك...">
                <button onclick="sendMessage()"><i class="fas fa-paper-plane"></i></button>
            </div>
        </div>
        <button class="chat-toggle" onclick="toggleChat(event)">
            <i class="fas fa-comments"></i>
        </button>
    </div>

    <script>
        function toggleFaq(element) {
            const parent = element.parentElement;
            parent.classList.toggle('active');
        }

        function toggleChat(event) {
            event.preventDefault();
            const widget = document.getElementById('chatWidget');
            widget.classList.toggle('show');
        }

        function sendMessage() {
            const input = document.getElementById('chatInput');
            const message = input.value.trim();
            
            if (message) {
                const messagesDiv = document.getElementById('chatMessages');
                const userMsg = document.createElement('div');
                userMsg.className = 'message user';
                userMsg.textContent = message;
                messagesDiv.appendChild(userMsg);
                input.value = '';
                
                setTimeout(() => {
                    const botMsg = document.createElement('div');
                    botMsg.className = 'message bot';
                    botMsg.textContent = 'شكراً لرسالتك! سيقوم فريقنا بالرد عليك قريباً.';
                    messagesDiv.appendChild(botMsg);
                    messagesDiv.scrollTop = messagesDiv.scrollHeight;
                }, 500);
            }
        }

        document.addEventListener('keypress', function(e) {
            if (e.key === 'Enter' && document.getElementById('chatInput') === document.activeElement) {
                sendMessage();
            }
        });
    </script>
</body>
</html>
    @include('components.footer')

</x-navbar>