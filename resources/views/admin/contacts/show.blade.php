<x-navbar title="details contact">

    <style>
        .contact-details-card {
            max-width: 1000px;
            margin: 2.5rem auto;
            border-radius: 18px;
            border: 1px solid #f6c16c;
            box-shadow: 0 2px 16px 0 rgba(240, 140, 30, 0.07);
            background: #fff;
        }
        .contact-details-card .card-header {
            background: #fff7ec;
            border-bottom: 1px solid #ffe2bc;
            border-radius: 18px 18px 0 0;
            text-align: center;
            padding: 1.3rem 1rem 0.9rem 1rem;
        }
        .contact-details-card .card-header .icon {
            color: #ff9100;
            font-size: 2.3rem;
            vertical-align: middle;
            margin-bottom: .2rem;
        }
        .contact-details-card .card-header h2 {
            color: #ff9100;
            font-size: 1.4rem;
            font-weight: bold;
            margin: .7rem 0 0 0;
            letter-spacing: 1px;
        }
        .contact-details-card .card-body {
            padding: 2.2rem 2.2rem 1.5rem 2.2rem;
        }
        .contact-info-grid {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 1.3rem 3rem;
            margin-bottom: 2.2rem;
        }
        .contact-info-item {
            display: flex;
            align-items: center;
            font-size: 1.13rem;
            color: #333;
        }
        .contact-info-item .icon {
            color: #ff9100;
            font-size: 1.15rem;
            margin-left: 7px;
            margin-right: 2px;
        }
        .contact-info-item strong {
            color: #ff9100;
            min-width: 80px;
            font-weight: 600;
            margin-left: 8px;
        }
        .from-user {
            font-size: 1.23rem;
            color: #174ea6;
            font-weight: bold;
            margin-bottom: 1.4rem;
            display: flex;
            align-items: center;
            gap: .6rem;
        }
        .contact-message-box {
            background: #f7f7f7;
            border-radius: 12px;
            padding: 1.5rem 1.4rem;
            font-size: 1.18rem;
            color: #222;
            margin-bottom: 1.7rem;
            border: 1px solid #ffe2bc;
            min-height: 130px;
            box-sizing: border-box;
            word-break: break-word;
        }
        .contact-message-box strong {
            color: #ff9100;
            font-size: 1.05rem;
            display: block;
            margin-bottom: .7rem;
            font-weight: 600;
        }
        .sent-at {
            color: #ff9100;
            font-size: 1rem;
            text-align: left;
            margin-bottom: 1.2rem;
            margin-top: -1.2rem;
        }
        .contact-details-card .card-footer {
            display: flex !important;
            justify-content: space-between !important;
            align-items: baseline;
            background: #fff;
            border-top: 1px solid #ffe2bc;
            border-radius: 0 0 18px 18px;
            padding: 1rem 2.2rem;
            display: flex;
            justify-content: flex-end;
            gap: 1.2rem;
        }
        .btn-electro {
            min-width: 130px;
            font-weight: 700;
            border-radius: 10px;
            border: none;
            padding: .7rem 1.3rem;
            font-size: 1.11rem;
            transition: background 0.2s;
            box-shadow: 0 2px 8px rgba(240,140,30,.07);
            display: flex;
            align-items: center;
            gap: .7rem;
        }
        .btn-electro-back {
            background: #ff9100;
            color: #fff;
        }
        .btn-electro-back:hover {
            background: #e67c00;
            color: #fff;
        }
        .btn-electro-delete {
            background: #ed1c24;
            color: #fff;
        }
        .btn-electro-delete:hover {
            background: #c10010;
            color: #fff;
        }
        @media (max-width: 900px) {
            .contact-details-card .card-body,
            .contact-details-card .card-footer { padding: 1rem .7rem; }
            .contact-info-grid { grid-template-columns: 1fr; gap: .8rem 0; }
        }
        @media (max-width: 600px) {
            .contact-details-card { max-width: 97vw; }
            .contact-details-card .card-body,
            .contact-details-card .card-footer { padding: .7rem .5rem; }
            .btn-electro { font-size: 1rem; min-width: 108px; }
        }
    </style>

    <div class="container py-5">
        <div class="contact-details-card">
            <div class="card-header">
                <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
                <h2>تفاصيل الرسالة</h2>
            </div>
            <div class="card-body">
                <div class="from-user">
                    <i class="fas fa-user icon"></i>
                    <span>من: {{ $contact->name }}</span>
                </div>
                <div class="contact-info-grid">
                    <div class="contact-info-item">
                        <i class="fas fa-envelope icon"></i>
                        <strong>البريد:</strong>
                        <span>{{ $contact->email }}</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-phone icon"></i>
                        <strong>الهاتف:</strong>
                        <span>{{ $contact->phone }}</span>
                    </div>
                    <div class="contact-info-item">
                        <i class="fas fa-tag icon"></i>
                        <strong>الموضوع:</strong>
                        <span>{{ $contact->subject }}</span>
                    </div>
                </div>
                <div class="contact-message-box">
                    <strong>الرسالة:</strong>
                    {{ $contact->message }}
                </div>
                <div class="sent-at">
                    <i class="far fa-clock"></i>
                    أُرسلت بتاريخ: {{ $contact->created_at->format('Y-m-d H:i') }}
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ route('admin.contacts.index') }}" class="btn btn-electro btn-electro-back">
                    <i class="fas fa-arrow-left"></i> رجوع
                </a>
                <form action="{{ route('admin.contacts.destroy', $contact->id) }}" method="POST"
                      onsubmit="return confirm('هل أنت متأكد من حذف هذه الرسالة؟');" style="display:inline;">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-electro btn-electro-delete">
                        <i class="fas fa-trash"></i> حذف
                    </button>
                </form>
            </div>
        </div>
    </div>
    <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>

  @include('components.footer')

</x-navbar>
