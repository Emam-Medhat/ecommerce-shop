<x-navbar title="مركز المساعدة">

<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">

<style>
    :root {
        --main-color: #f28b00;
    }

    body {
        background-color: #fffaf3;
    }

    .section-title {
        font-weight: 800;
        color: var(--main-color);
        margin-bottom: 25px;
        border-bottom: 3px solid var(--main-color);
        display: inline-block;
        padding-bottom: 8px;
    }

    .card-custom {
        border: none;
        border-radius: 18px;
        box-shadow: 0 5px 25px rgba(0,0,0,0.08);
        transition: all 0.3s ease;
        background-color: #fff;
    }

    .card-custom:hover {
        transform: translateY(-5px);
        box-shadow: 0 8px 30px rgba(0,0,0,0.1);
    }

    .step {
        display: flex;
        align-items: start;
        gap: 15px;
        margin-bottom: 20px;
    }

    .step-number {
        background-color: var(--main-color);
        color: white;
        font-weight: bold;
        width: 38px;
        height: 38px;
        border-radius: 50%;
        text-align: center;
        line-height: 38px;
        font-size: 18px;
    }

    .highlight {
        color: var(--main-color);
        font-weight: bold;
    }

    .faq .accordion-button:not(.collapsed) {
        background-color: #fff3e0;
        color: var(--main-color);
        font-weight: bold;
    }

    .contact-form button {
        background-color: var(--main-color);
        border: none;
    }

    .contact-form button:hover {
        background-color: #d47800;
    }

    .icon-feature {
        color: var(--main-color);
        font-size: 2rem;
        margin-bottom: 10px;
    }

    .section-bg {
        background: linear-gradient(180deg, #fffaf3 0%, #fff3e0 100%);
        padding: 50px 0;
    }
</style>

<div class="container py-5">

    <!-- مقدمة -->
    <div class="text-center mb-5">
        <h1 class="fw-bold text-uppercase" style="color: var(--main-color);">مركز المساعدة</h1>
        <p class="text-muted fs-5">هنا ستجد كل ما تحتاج معرفته لاستخدام موقعنا بكل سهولة واحترافية، سواء كنت مشتريًا أو بائعًا.</p>
    </div>

    <!-- فكرة الموقع -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-stars me-2"></i>ما هو موقعنا؟</h3>
        <p class="fs-5 text-muted">
            موقعنا هو منصة إلكترونية متكاملة تتيح للمستخدمين بيع وشراء المنتجات بسهولة وأمان.  
            هدفنا هو ربط البائعين بالمشترين في بيئة احترافية تضمن الجودة والثقة والسرعة في المعاملات.
        </p>
        <div class="row text-center mt-4">
            <div class="col-md-4">
                <i class="bi bi-cart-check icon-feature"></i>
                <h5>شراء سهل وآمن</h5>
                <p class="text-muted">اختر منتجك، أضفه للسلة، وادفع بكل أمان باستخدام طرق الدفع المعتمدة.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-shop icon-feature"></i>
                <h5>بيع منتجاتك</h5>
                <p class="text-muted">افتح متجرك الخاص وابدأ ببيع منتجاتك بسهولة عبر لوحة البائع.</p>
            </div>
            <div class="col-md-4">
                <i class="bi bi-shield-lock icon-feature"></i>
                <h5>أمان عالي</h5>
                <p class="text-muted">نظام مراجعة وضمان جودة لحماية المشترين والبائعين من أي تلاعب.</p>
            </div>
        </div>
    </div>

    <!-- إنشاء حساب جديد -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-person-plus-fill me-2"></i>إنشاء حساب جديد</h3>
        <div class="step"><div class="step-number">1</div><div>اضغط على زر <span class="highlight">تسجيل</span> في الشريط العلوي.</div></div>
        <div class="step"><div class="step-number">2</div><div>املأ بياناتك: الاسم، البريد الإلكتروني، كلمة المرور.</div></div>
        <div class="step"><div class="step-number">3</div><div>اضغط <span class="highlight">إنشاء حساب</span> وستصلك رسالة تأكيد.</div></div>
        <div class="alert alert-warning mt-3"><i class="bi bi-lightbulb-fill"></i> يمكنك تسجيل الدخول بعد التفعيل فورًا.</div>
    </div>

    <!-- لوحة المستخدم -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-person-gear me-2"></i>لوحة المستخدم</h3>
        <p class="fs-5 text-muted">من خلال لوحة التحكم الخاصة بك، يمكنك:</p>
        <ul class="list-group list-group-flush fs-6">
            <li class="list-group-item">🛍️ عرض المنتجات التي اشتريتها.</li>
            <li class="list-group-item">💬 التواصل مع البائعين مباشرة.</li>
            <li class="list-group-item">❤️ حفظ المنتجات المفضلة لديك.</li>
            <li class="list-group-item">🧾 إدارة عنوان الشحن وطرق الدفع.</li>
        </ul>
    </div>

    <!-- لوحة البائع -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-building-add me-2"></i>لوحة البائع</h3>
        <p class="fs-5 text-muted">للبائعين، نوفر لوحة تحكم كاملة تتيح لك:</p>
        <ul class="list-group list-group-flush fs-6">
            <li class="list-group-item">➕ إضافة منتجات جديدة مع الصور والوصف والسعر.</li>
            <li class="list-group-item">📊 متابعة الطلبات والمبيعات يوميًا.</li>
            <li class="list-group-item">🕒 مراجعة حالة المنتجات (قيد المراجعة – مقبولة – مرفوضة).</li>
            <li class="list-group-item">💰 إدارة الأرباح وتحويلها لحسابك البنكي.</li>
        </ul>
    </div>

    <!-- طرق الدفع -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-credit-card-2-front me-2"></i>طرق الدفع</h3>
        <p class="fs-5 text-muted">نوفر أكثر من طريقة آمنة للدفع، منها:</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item"><i class="bi bi-bank2 me-2 text-success"></i>التحويل البنكي المباشر.</li>
            <li class="list-group-item"><i class="bi bi-wallet2 me-2 text-primary"></i>الدفع الإلكتروني (PayPal - Stripe).</li>
            <li class="list-group-item"><i class="bi bi-cash-coin me-2 text-warning"></i>الدفع عند الاستلام في بعض المناطق.</li>
        </ul>
    </div>

    <!-- الأمان والخصوصية -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-shield-check me-2"></i>سياسة الأمان والخصوصية</h3>
        <p class="fs-5 text-muted">نلتزم بأعلى معايير الأمان في حفظ بيانات المستخدمين والمعاملات.</p>
        <ul class="list-group list-group-flush">
            <li class="list-group-item">🔒 جميع المعاملات تتم عبر اتصال آمن (SSL).</li>
            <li class="list-group-item">🧾 لا نشارك بياناتك مع أي طرف ثالث دون إذنك.</li>
            <li class="list-group-item">📧 يمكنك حذف حسابك في أي وقت.</li>
        </ul>
    </div>

    <!-- التواصل مع الدعم -->
    <div class="card card-custom p-4 mb-5">
        <h3 class="section-title"><i class="bi bi-headset me-2"></i>التواصل مع الدعم الفني</h3>
        <form class="contact-form p-3 bg-light rounded-4 shadow-sm">
            <div class="mb-3">
                <label class="form-label">الاسم الكامل</label>
                <input type="text" class="form-control" placeholder="أدخل اسمك الكامل">
            </div>
            <div class="mb-3">
                <label class="form-label">البريد الإلكتروني</label>
                <input type="email" class="form-control" placeholder="example@email.com">
            </div>
            <div class="mb-3">
                <label class="form-label">الرسالة</label>
                <textarea class="form-control" rows="4" placeholder="اكتب مشكلتك أو سؤالك هنا..."></textarea>
            </div>
            <button class="btn btn-primary w-100"><i class="bi bi-send-fill me-1"></i> إرسال</button>
        </form>
    </div>

    <!-- الأسئلة الشائعة -->
    <div class="card card-custom p-4 faq mb-5">
        <h3 class="section-title"><i class="bi bi-question-circle-fill me-2"></i>الأسئلة الشائعة</h3>
        <div class="accordion mt-3" id="faqAccordion">
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button" data-bs-toggle="collapse" data-bs-target="#f1">هل التسجيل مجاني؟</button></h2>
                <div id="f1" class="accordion-collapse collapse show"><div class="accordion-body">نعم، التسجيل مجاني تمامًا لجميع المستخدمين.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#f2">كم تستغرق مراجعة المنتجات؟</button></h2>
                <div id="f2" class="accordion-collapse collapse"><div class="accordion-body">عادة خلال 24–48 ساعة من الإرسال.</div></div>
            </div>
            <div class="accordion-item">
                <h2 class="accordion-header"><button class="accordion-button collapsed" data-bs-toggle="collapse" data-bs-target="#f3">كيف أتواصل مع الدعم؟</button></h2>
                <div id="f3" class="accordion-collapse collapse"><div class="accordion-body">عبر النموذج أعلاه أو البريد: <a href="mailto:support@example.com">support@example.com</a>.</div></div>
            </div>
        </div>
    </div>

    <div class="text-center mt-5 text-muted">
        <p>© {{ date('Y') }} جميع الحقوق محفوظة لموقعك | تصميم بأيدي فريق <span class="highlight">الدعم التقني</span></p>
    </div>

</div>

</x-navbar>
