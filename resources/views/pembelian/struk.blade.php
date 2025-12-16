<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Receipt #{{ $trx->id }} | Shiny Flakes</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>

    <style>
        :root {
            --primary: #3f51b5; /* Warna Permintaan Anda */
            --primary-dark: #2c387e;
            --bg-light: #f4f6f8;
            --text-dark: #1d1d1f;
            --text-grey: #86868b;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-light);
            margin: 0;
            padding: 40px 20px;
            color: var(--text-dark);
            display: flex;
            flex-direction: column;
            align-items: center;
            min-height: 100vh;
        }

        /* AREA TOMBOL AKSI (Tidak ikut di-print/download) */
        .action-bar {
            margin-bottom: 30px;
            display: flex;
            gap: 15px;
            flex-wrap: wrap;
            justify-content: center;
        }

        .btn {
            border: none;
            padding: 12px 25px;
            border-radius: 50px;
            font-family: 'Outfit', sans-serif;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            display: flex;
            align-items: center;
            gap: 8px;
            transition: 0.2s;
            text-decoration: none;
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
        }

        .btn-back { background: white; color: var(--text-dark); }
        .btn-print { background: var(--primary); color: white; }
        .btn-download { background: #10b981; color: white; } /* Hijau untuk download */
        
        .btn:hover { transform: translateY(-2px); box-shadow: 0 6px 15px rgba(0,0,0,0.15); opacity: 0.9; }

        /* KARTU STRUK (Area yang akan di-capture) */
        .receipt-card {
            background: white;
            width: 100%;
            max-width: 480px;
            border-radius: 0; /* Kotak agar rapi saat print, atau rounded jika mau */
            box-shadow: 0 20px 40px rgba(63, 81, 181, 0.1); /* Bayangan bernuansa ungu */
            overflow: hidden;
            position: relative;
            padding: 0;
        }

        /* Hiasan Atas */
        .receipt-top-deco {
            height: 12px;
            background: var(--primary);
            width: 100%;
        }

        .receipt-body {
            padding: 40px;
        }

        /* HEADER */
        .header {
            text-align: center;
            margin-bottom: 40px;
            border-bottom: 2px dashed #eee;
            padding-bottom: 30px;
        }
        .logo-area {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 10px;
        }
        .logo-img { height: 50px; width: auto; }
        .logo-text { height: 35px; width: auto; margin-top: 5px; }
        
        .receipt-id {
            background-color: rgba(63, 81, 181, 0.1);
            color: var(--primary);
            padding: 5px 15px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 700;
            display: inline-block;
            margin-top: 10px;
        }

        /* INFO LIST */
        .info-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 15px;
            font-size: 14px;
        }
        .info-label { color: var(--text-grey); font-weight: 500; }
        .info-value { font-weight: 700; text-align: right; }

        /* PRODUK */
        .product-box {
            background: #fafafa;
            border-radius: 12px;
            padding: 20px;
            margin: 20px 0;
            border: 1px solid #eee;
        }
        .product-name {
            font-size: 16px;
            font-weight: 800;
            margin-bottom: 5px;
            color: var(--primary);
        }
        .product-detail {
            display: flex;
            justify-content: space-between;
            font-size: 14px;
            color: var(--text-grey);
        }

        /* TOTAL */
        .total-box {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-top: 30px;
            padding-top: 20px;
            border-top: 2px solid var(--primary);
        }
        .total-label { font-size: 18px; font-weight: 600; }
        .total-value { font-size: 24px; font-weight: 900; color: var(--primary); }

        /* FOOTER */
        .footer {
            text-align: center;
            margin-top: 40px;
            font-size: 12px;
            color: var(--text-grey);
        }
        .status-badge {
            display: inline-block;
            border: 2px solid var(--primary);
            color: var(--primary);
            padding: 8px 30px;
            border-radius: 5px;
            font-weight: 900;
            font-size: 20px;
            text-transform: uppercase;
            letter-spacing: 2px;
            transform: rotate(-5deg);
            margin-bottom: 20px;
            opacity: 0.8;
        }

        /* MEDIA PRINT */
        @media print {
            body { background: white; padding: 0; justify-content: start; }
            .action-bar { display: none !important; }
            .receipt-card { box-shadow: none; max-width: 100%; border: none; }
            .receipt-top-deco { -webkit-print-color-adjust: exact; print-color-adjust: exact; }
        }
    </style>
</head>
<body>

    <div class="action-bar">
        <a href="{{ route('pembelian') }}" class="btn btn-back">
            <i class="mdi mdi-arrow-left"></i> Back
        </a>
        <button onclick="window.print()" class="btn btn-print">
            <i class="mdi mdi-printer"></i> Print / PDF
        </button>
        <button onclick="downloadImage()" class="btn btn-download">
            <i class="mdi mdi-download"></i> Save as Image
        </button>
    </div>

    <div class="receipt-card" id="captureArea">
        <div class="receipt-top-deco"></div>
        
        <div class="receipt-body">
            <div class="header">
                <div class="logo-area">
                    <img src="{{ asset('assets/images/logo-icon.png') }}" class="logo-img" alt="Icon">
                    <img src="{{ asset('assets/images/logo-text.png') }}" class="logo-text" alt="Shiny Flakes">
                </div>
                <div class="receipt-id">ORDER ID: #TRX-{{ $trx->id }}</div>
            </div>

            <div class="info-row">
                <span class="info-label">Date</span>
                <span class="info-value">{{ $trx->created_at->format('d M Y, H:i') }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Customer</span>
                <span class="info-value">{{ $trx->customer_name }}</span>
            </div>
            <div class="info-row">
                <span class="info-label">Payment Method</span>
                <span class="info-value" style="text-transform: uppercase;">
                    @if(strtolower($trx->payment_method) == 'bitcoin')
                        <i class="mdi mdi-bitcoin"></i> 
                    @elseif(strtolower($trx->payment_method) == 'ethereum')
                        <i class="mdi mdi-ethereum"></i> 
                    @endif
                    {{ $trx->payment_method }}
                </span>
            </div>

            <div class="product-box">
                <div class="product-name">{{ $trx->item_name }}</div>
                <div class="product-detail">
                    <span>Qty: {{ $trx->quantity }}</span>
                    <span>@ Rp {{ number_format($trx->total_price / $trx->quantity, 0, ',', '.') }}</span>
                </div>
            </div>

            <div class="total-box">
                <span class="total-label">TOTAL PAID</span>
                <span class="total-value">Rp {{ number_format($trx->total_price, 0, ',', '.') }}</span>
            </div>

            <div class="footer">
                <div class="status-badge">PAID</div>
                <p>Thank you for shopping at Shiny Flakes.</p>
                <p>www.shinyflakes.com</p>
            </div>
        </div>
    </div>

    <script>
        function downloadImage() {
            // Pilih elemen struk
            const element = document.getElementById("captureArea");
            
            // Konversi ke Canvas lalu ke Gambar
            html2canvas(element, { scale: 2 }).then(canvas => {
                // Buat link download
                const link = document.createElement("a");
                link.download = "Receipt-TRX-{{ $trx->id }}.png";
                link.href = canvas.toDataURL("image/png");
                link.click();
            });
        }
    </script>

</body>
</html>