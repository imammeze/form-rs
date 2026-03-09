<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notifikasi Keluhan dan Ulasan Baru</title>
    <style>
        body {
            font-family: 'Helvetica Neue', Helvetica, Arial, sans-serif;
            background-color: #f9fafb;
            color: #374151;
            margin: 0;
            padding: 0;
            line-height: 1.6;
        }
        .email-wrapper {
            width: 100%;
            padding: 30px 15px;
            background-color: #f9fafb;
            box-sizing: border-box;
        }
        .email-card {
            max-width: 600px;
            margin: 0 auto;
            background-color: #ffffff;
            border-radius: 8px;
            overflow: hidden;
            border: 1px solid #e5e7eb;
            box-shadow: 0 1px 3px rgba(0,0,0,0.05);
        }
        .header {
            background-color: #2563eb;
            color: #ffffff;
            padding: 24px;
            text-align: center;
        }
        .header h2 {
            margin: 0;
            font-size: 20px;
            font-weight: 600;
        }
        .content {
            padding: 24px;
        }
        .section-title {
            font-size: 16px;
            font-weight: bold;
            color: #111827;
            border-bottom: 2px solid #f3f4f6;
            padding-bottom: 8px;
            margin-bottom: 16px;
            margin-top: 24px;
        }
        .section-title:first-child {
            margin-top: 0;
        }
        .data-row {
            margin-bottom: 12px;
        }
        .data-label {
            font-size: 13px;
            color: #6b7280;
            display: block;
            margin-bottom: 4px;
        }
        .data-value {
            font-size: 15px;
            color: #1f2937;
            font-weight: 500;
        }
        .content-box {
            background-color: #f9fafb;
            border: 1px solid #e5e7eb;
            border-radius: 6px;
            padding: 16px;
            font-size: 14px;
            color: #374151;
            white-space: pre-wrap;
        }
        .rating-stars {
            color: #eab308;
            font-size: 20px;
            font-weight: bold;
        }
        .btn-attachment {
            display: inline-block;
            background-color: #f3f4f6;
            color: #4b5563;
            text-decoration: none;
            padding: 8px 16px;
            border-radius: 6px;
            font-size: 14px;
            font-weight: 500;
            border: 1px solid #d1d5db;
            margin-top: 10px;
        }
        .footer {
            background-color: #f9fafb;
            padding: 16px;
            text-align: center;
            font-size: 12px;
            color: #9ca3af;
            border-top: 1px solid #e5e7eb;
        }
    </style>
</head>
<body>
    <div class="email-wrapper">
        <div class="email-card">
            <div class="header">
                <h2>Laporan Layanan Pasien Baru</h2>
            </div>

            <div class="content">
                <p>Halo Admin,</p>
                <p>Sistem telah menerima saran/keluhan dan ulasan baru dari pasien. Berikut adalah rinciannya:</p>

                <div class="section-title">Detail Laporan</div>
                
                <div class="data-row">
                    <span class="data-label">Nama Pasien:</span>
                    <span class="data-value">{{ $feedback->name ?: 'Anonim (Tidak menyertakan nama)' }}</span>
                </div>
                
                <div class="data-row">
                    <span class="data-label">Unit Layanan:</span>
                    <span class="data-value">{{ $feedback->unit }}</span>
                </div>

                <div class="data-row">
                    <span class="data-label">Isi Keluhan/Saran:</span>
                    <div class="content-box">{{ $feedback->content }}</div>
                </div>

                @if($feedback->photo_path)
                <div class="data-row">
                    <span class="data-label">Lampiran Bukti:</span>
                    <a href="{{ asset('storage/' . $feedback->photo_path) }}" target="_blank" class="btn-attachment">
                        &#128279; Lihat Foto/Bukti yang Dilampirkan
                    </a>
                </div>
                @endif

                @if($review)
                    <div class="section-title">Ulasan Layanan</div>

                    <div class="data-row">
                        <span class="data-label">Rating Diberikan:</span>
                        <span class="rating-stars">
                            {{ str_repeat('★', $review->rating) }}{{ str_repeat('☆', 5 - $review->rating) }} 
                            <span style="color: #374151; font-size: 16px;">({{ $review->rating }}/5)</span>
                        </span>
                    </div>

                    @if($review->review_text)
                    <div class="data-row">
                        <span class="data-label">Ulasan Tambahan:</span>
                        <div class="content-box">{{ $review->review_text }}</div>
                    </div>
                    @endif
                @else
                    <div class="section-title">Status Ulasan</div>
                    <div class="data-row">
                        <span class="data-value" style="color: #6b7280; font-style: italic;">
                            Pasien belum memberikan rating/ulasan saat email ini dikirim. Silakan cek Dashboard Admin secara berkala untuk melihat rating.
                        </span>
                    </div>
                @endif
            </div>

            <div class="footer">
                <p>Email ini dihasilkan otomatis oleh Sistem Layanan Rumah Sakit.</p>
                <p>&copy; {{ date('Y') }} Rumah Sakit. Semua hak dilindungi.</p>
            </div>
        </div>
    </div>
</body>
</html>