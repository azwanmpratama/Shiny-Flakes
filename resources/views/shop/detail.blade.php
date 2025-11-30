<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail | Shiny Flakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;800&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        :root {
            --primary: #3F51B5; /* Indigo */
            --bg-body: #ffffff;
            --bg-card: #F4F6F8;
            --text-main: #111111;
            --text-muted: #666666;
            
            /* Dark Mode Vars */
            --bg-dark: #050505;
            --card-dark: #121212;
            --text-dark: #e0e0e0;
        }

        body {
            font-family: 'Poppins', sans-serif;
            background-color: var(--bg-body);
            color: var(--text-main);
            transition: all 0.5s ease;
        }

        /* --- DARK MODE STYLES --- */
        [data-bs-theme="dark"] body { background-color: var(--bg-dark); color: var(--text-dark); }
        [data-bs-theme="dark"] .navbar { background: rgba(20,20,20,0.95); border-bottom: 1px solid #333; }
        [data-bs-theme="dark"] .bg-soft { background-color: var(--card-dark) !important; }
        [data-bs-theme="dark"] .text-main { color: var(--text-dark) !important; }
        [data-bs-theme="dark"] .form-control, [data-bs-theme="dark"] .form-select {
            background-color: #222; border-color: #333; color: white;
        }
        [data-bs-theme="dark"] .qty-btn { background: #333; color: white; }
        [data-bs-theme="dark"] .breadcrumb-item a { color: #888; }
        [data-bs-theme="dark"] .modal-content { background-color: #1a1a1a; border: 1px solid #333; color: white; }
        [data-bs-theme="dark"] .btn-close { filter: invert(1); }
        [data-bs-theme="dark"] .offcanvas { background-color: var(--card-dark); color: var(--text-dark); }

        /* --- NAVBAR --- */
        .navbar { background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); padding: 15px 0; border-bottom: 1px solid transparent; transition: 0.5s; }
        .nav-link { font-weight: 600; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; color: var(--text-main) !important; }
        .nav-link:hover { color: var(--primary) !important; }
        .logo-text { font-weight: 900; letter-spacing: -1px; font-size: 1.5rem; color: var(--primary); }

        /* --- PRODUCT GALLERY --- */
        .gallery-container {
            background-color: var(--bg-card);
            border-radius: 30px;
            padding: 40px;
            text-align: center;
            height: 100%;
            display: flex; flex-direction: column; justify-content: center; align-items: center;
        }
        .main-img {
            max-width: 100%; height: 450px; object-fit: contain;
            filter: drop-shadow(0 20px 40px rgba(0,0,0,0.1));
            transition: 0.5s;
        }
        .main-img:hover { transform: scale(1.05); }
        
        .thumb-list { display: flex; gap: 15px; margin-top: 30px; }
        .thumb-item { 
            width: 70px; height: 70px; border-radius: 15px; 
            background: white; padding: 5px; cursor: pointer; 
            border: 2px solid transparent; transition: 0.3s;
            display: flex; align-items: center; justify-content: center;
        }
        .thumb-item img { width: 100%; height: 100%; object-fit: contain; }
        .thumb-item:hover, .thumb-item.active { border-color: var(--primary); transform: translateY(-3px); }
        [data-bs-theme="dark"] .thumb-item { background: #222; }

        /* --- PRODUCT INFO --- */
        .badge-stock { background: #e0f2f1; color: #00695c; padding: 5px 15px; border-radius: 20px; font-weight: 600; font-size: 0.8rem; }
        [data-bs-theme="dark"] .badge-stock { background: #004d40; color: #80cbc4; }
        
        .product-title { font-weight: 800; font-size: 2.5rem; margin-top: 15px; margin-bottom: 10px; line-height: 1.1; }
        .product-price { font-size: 1.8rem; font-weight: 700; color: var(--primary); margin-bottom: 20px; }
        
        /* Selectors */
        .option-title { font-size: 0.9rem; font-weight: 700; text-transform: uppercase; margin-bottom: 10px; display: block; }
        
        .size-selector input { display: none; }
        .size-selector label {
            display: inline-block; width: 45px; height: 45px; line-height: 43px; text-align: center;
            border: 1px solid #ddd; border-radius: 12px; margin-right: 8px; cursor: pointer;
            font-weight: 600; transition: 0.2s;
        }
        .size-selector input:checked + label { background-color: var(--primary); color: white; border-color: var(--primary); }
        [data-bs-theme="dark"] .size-selector label { border-color: #333; color: #ccc; }

        /* Qty & Buttons */
        .qty-wrapper {
            display: flex; align-items: center; background: white; border: 1px solid #eee; 
            border-radius: 50px; padding: 5px; width: fit-content;
        }
        [data-bs-theme="dark"] .qty-wrapper { background: #222; border-color: #333; }
        
        .qty-btn { 
            width: 35px; height: 35px; border-radius: 50%; border: none; 
            background: #f8f9fa; font-weight: bold; transition: 0.2s; 
        }
        .qty-btn:hover { background: var(--primary); color: white; }
        .qty-input { width: 40px; text-align: center; border: none; background: transparent; font-weight: bold; color: inherit; }

        .btn-buy {
            background-color: var(--primary); color: white; border: none;
            padding: 15px 40px; border-radius: 50px; font-weight: 700;
            font-size: 1rem; box-shadow: 0 10px 20px rgba(63, 81, 181, 0.3);
            transition: 0.3s; flex-grow: 1;
        }
        .btn-buy:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(63, 81, 181, 0.5); background-color: #303f9f; color: white;}

        /* --- MODAL PAYMENT --- */
        .crypto-option {
            border: 2px solid #eee; border-radius: 15px; padding: 15px; cursor: pointer;
            display: flex; align-items: center; gap: 10px; transition: 0.3s;
        }
        .crypto-option:hover, .crypto-option.active { border-color: var(--primary); background-color: rgba(63, 81, 181, 0.05); }
        [data-bs-theme="dark"] .crypto-option { border-color: #333; }
        [data-bs-theme="dark"] .crypto-option.active { background-color: rgba(63, 81, 181, 0.2); }
        
        .wallet-address { font-family: monospace; font-size: 0.9rem; background: #eee; padding: 10px; border-radius: 8px; word-break: break-all; }
        [data-bs-theme="dark"] .wallet-address { background: #000; border: 1px solid #333; color: #0f0; }

        /* Animation */
        .fade-in { animation: fadeIn 0.6s ease forwards; opacity: 0; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('shop.index') }}">
                <i class="mdi mdi-arrow-left fs-4 text-main"></i>
                <span class="text-main fw-bold" style="font-size: 0.9rem;">BACK TO SHOP</span>
            </a>
            
            <div class="d-flex align-items-center gap-3">
                <span class="logo-text d-none d-md-block" id="navBrandText">SHINY FLAKES</span>
            </div>

            <div class="d-flex align-items-center gap-4">
                <a href="#" class="nav-link position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                    <i class="mdi mdi-shopping-outline fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">2</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px; margin-bottom: 80px;">
        <nav aria-label="breadcrumb" class="mb-4">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted">Shop</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted" id="breadCat">Apparel</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="breadName">Jacket</li>
            </ol>
        </nav>

        <div class="row align-items-center">
            <div class="col-lg-6 mb-5 mb-lg-0 fade-in">
                <div class="gallery-container bg-soft">
                    <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=600&q=80" id="mainImage" class="main-img">
                    
                    <div class="thumb-list">
                        <div class="thumb-item active" onclick="changeImage(this)">
                            <img src="https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=150&q=80" id="thumb1">
                        </div>
                        <div class="thumb-item" onclick="changeImage(this)">
                            <img src="https://images.unsplash.com/photo-1551488852-0801751ac367?auto=format&fit=crop&w=150&q=80" id="thumb2">
                        </div>
                        <div class="thumb-item" onclick="changeImage(this)">
                            <img src="https://images.unsplash.com/photo-1576995853123-5a10305d93c0?auto=format&fit=crop&w=150&q=80" id="thumb3">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5 fade-in" style="animation-delay: 0.2s;">
                <span class="badge-stock mb-2 d-inline-block">In Stock</span>
                <h1 class="product-title text-main" id="prodName">Technical Bomber V3</h1>
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="text-warning small">
                        <i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i>
                    </div>
                    <span class="text-muted small">(450 Reviews)</span>
                </div>
                <h2 class="product-price" id="prodPrice">Rp 2.500.000</h2>

                <p class="text-muted mb-4" id="prodDesc">
                    Premium quality bomber jacket with water-resistant material. Designed for urban exploration and maximum comfort. Features multiple pockets and a sleek silhouette.
                </p>

                <div class="mb-4">
                    <span class="option-title" id="optionTitle">Select Size</span>
                    <div class="size-selector" id="optionContainer">
                        <input type="radio" name="size" id="s" checked><label for="s">S</label>
                        <input type="radio" name="size" id="m"><label for="m">M</label>
                        <input type="radio" name="size" id="l"><label for="l">L</label>
                        <input type="radio" name="size" id="xl"><label for="xl">XL</label>
                    </div>
                </div>

                <div class="d-flex gap-3 align-items-center pb-4 border-bottom border-secondary border-opacity-10">
                    <div class="qty-wrapper">
                        <button class="qty-btn" onclick="desc()">-</button>
                        <input type="text" class="qty-input" id="qty" value="1" readonly>
                        <button class="qty-btn" onclick="inc()">+</button>
                    </div>
                    <button class="btn-buy" data-bs-toggle="modal" data-bs-target="#paymentModal">
                        <i class="mdi mdi-flash me-2"></i> BUY NOW
                    </button>
                    <button class="btn btn-outline-secondary rounded-circle" style="width: 50px; height: 50px;">
                        <i class="mdi mdi-heart-outline"></i>
                    </button>
                </div>

                <div class="mt-4 d-flex align-items-center gap-3">
                    <i class="mdi mdi-shield-check-outline fs-1 text-success opacity-75"></i>
                    <div>
                        <h6 class="fw-bold mb-0 text-main">Guaranteed Authentic</h6>
                        <small class="text-muted">100% Original product verification.</small>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="paymentModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 shadow-lg">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-main"><i class="mdi mdi-lock text-primary"></i> Secure Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body p-4 pt-2">
                    <p class="text-muted small mb-4">Select your preferred blockchain network:</p>
                    
                    <div class="d-flex gap-3 mb-4">
                        <div class="crypto-option active flex-grow-1" id="opt-btc" onclick="selectCoin('btc')">
                            <i class="mdi mdi-bitcoin fs-3 text-warning"></i>
                            <div>
                                <h6 class="mb-0 fw-bold text-main">Bitcoin</h6>
                                <small class="text-muted">BTC Network</small>
                            </div>
                        </div>
                        <div class="crypto-option flex-grow-1" id="opt-eth" onclick="selectCoin('eth')">
                            <i class="mdi mdi-ethereum fs-3 text-primary"></i>
                            <div>
                                <h6 class="mb-0 fw-bold text-main">Ethereum</h6>
                                <small class="text-muted">ERC20</small>
                            </div>
                        </div>
                    </div>

                    <div class="text-center p-3 rounded-3 mb-3 bg-soft">
                        <h3 class="fw-bold text-main" id="modalPrice">Rp 2.500.000</h3>
                        <div class="bg-white p-2 d-inline-block rounded mb-3 border">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh" width="120" id="qrImage">
                        </div>
                        <p class="small text-muted mb-1 text-start">Wallet Address:</p>
                        <div class="input-group">
                            <div class="wallet-address flex-grow-1 text-truncate" id="walletAddr">bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh</div>
                            <button class="btn btn-sm btn-outline-secondary" onclick="copyAddr()"><i class="mdi mdi-content-copy"></i></button>
                        </div>
                    </div>

                    <button class="btn btn-primary w-100 py-3 rounded-pill fw-bold" onclick="confirmPayment()">I Have Sent Payment</button>
                </div>
            </div>
        </div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold text-main">Shopping Bag</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center text-muted">
            <i class="mdi mdi-shopping-outline fs-1 mb-3 opacity-50"></i>
            <p>Your bag is empty.</p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // --- LOGIC DETEKSI MODE (MAGIC HAPPENS HERE) ---
        window.onload = function() {
            // Cek status dari LocalStorage (yang diset di halaman Index)
            const isDrugMode = localStorage.getItem('shinyMode') === 'true';
            
            if(isDrugMode) {
                enableDrugMode();
            } else {
                enableFashionMode();
            }
        };

        function enableDrugMode() {
            // 1. Set Tema Gelap
            document.documentElement.setAttribute('data-bs-theme', 'dark');
            
            // 2. Ubah Konten Teks
            document.getElementById('navBrandText').innerText = "THE MARKET";
            document.getElementById('breadCat').innerText = "Substances";
            document.getElementById('breadName').innerText = "Pills";
            document.getElementById('prodName').innerText = "Shiny Flakes XTC (240mg)";
            document.getElementById('prodPrice').innerText = "Rp 450.000";
            document.getElementById('modalPrice').innerText = "Rp 450.000";
            document.getElementById('prodDesc').innerText = "High purity MDMA press. Imported directly from NL laboratories. Vacuum sealed and stealth shipping guaranteed. Use responsibly.";
            
            // 3. Ubah Gambar (Gunakan Asset Lokal Anda)
            // Ganti URL ini dengan {{ asset('assets/images/drug/d1.png') }} dsb
            const drugImg = "{{ asset('assets/images/drug/d1.png') }}";
            document.getElementById('mainImage').src = drugImg;
            document.getElementById('thumb1').src = drugImg;
            document.getElementById('thumb2').src = "{{ asset('assets/images/drug/d1.png') }}"; // Ganti variasi lain
            document.getElementById('thumb3').src = "{{ asset('assets/images/drug/d1.png') }}";

            // 4. Ubah Pilihan (Size jadi Jumlah)
            document.getElementById('optionTitle').innerText = "Select Package";
            document.getElementById('optionContainer').innerHTML = `
                <input type="radio" name="size" id="s" checked><label for="s" style="width:auto; padding:0 15px;">5pcs</label>
                <input type="radio" name="size" id="m"><label for="m" style="width:auto; padding:0 15px;">10pcs</label>
                <input type="radio" name="size" id="l"><label for="l" style="width:auto; padding:0 15px;">25pcs</label>
                <input type="radio" name="size" id="xl"><label for="xl" style="width:auto; padding:0 15px;">50pcs</label>
            `;
        }

        function enableFashionMode() {
            document.documentElement.setAttribute('data-bs-theme', 'light');
            // Konten default HTML sudah Fashion, jadi tidak perlu diubah banyak
        }

        // --- INTERAKSI LAIN ---
        function changeImage(el) {
            document.getElementById('mainImage').src = el.querySelector('img').src;
            document.querySelectorAll('.thumb-item').forEach(i => i.classList.remove('active'));
            el.classList.add('active');
        }

        function inc() { document.getElementById('qty').value++; }
        function desc() { let v = document.getElementById('qty'); if(v.value > 1) v.value--; }

        function selectCoin(coin) {
            document.querySelectorAll('.crypto-option').forEach(el => el.classList.remove('active'));
            document.getElementById('opt-' + coin).classList.add('active');
            
            if(coin === 'btc') {
                document.getElementById('walletAddr').innerText = "bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh";
                document.getElementById('qrImage').src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh";
            } else {
                document.getElementById('walletAddr').innerText = "0x71C7656EC7ab88b098defB751B7401B5f6d8976F";
                document.getElementById('qrImage').src = "https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=0x71C7656EC7ab88b098defB751B7401B5f6d8976F";
            }
        }

        function copyAddr() {
            const text = document.getElementById('walletAddr').innerText;
            navigator.clipboard.writeText(text);
            const Toast = Swal.mixin({
                toast: true, position: 'top-end', showConfirmButton: false, timer: 2000,
                background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#333' : '#fff',
                color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000'
            });
            Toast.fire({ icon: 'success', title: 'Address Copied!' });
        }

        function confirmPayment() {
        // Ambil data dari halaman
        // Kita perlu tahu mode apa yang sedang aktif (Fashion/Drug)
        const isDrugMode = localStorage.getItem('shinyMode') === 'true';
        
        let itemName, itemPrice;
        
        if (isDrugMode) {
            itemName = "Shiny Flakes XTC (240mg)"; // Sesuai mode drug
            itemPrice = "450000"; // Harga satuan
        } else {
            itemName = "Technical Bomber V3"; // Sesuai mode fashion
            itemPrice = "2500000"; // Harga satuan
        }

        const qty = document.getElementById('qty').value;
        // Hitung total harga dasar x jumlah
        const totalPrice = parseInt(itemPrice) * parseInt(qty);
        
        // Cek coin mana yang aktif
        const coin = document.querySelector('.crypto-option.active h6').innerText;

        // Tutup Modal Bootstrap
        var myModalEl = document.getElementById('paymentModal');
        var modal = bootstrap.Modal.getInstance(myModalEl);
        modal.hide();

        // 1. Tampilkan Loading SweetAlert
        Swal.fire({
            title: 'Verifying Payment',
            html: 'Scanning blockchain network... please wait.',
            timerProgressBar: true,
            didOpen: () => { Swal.showLoading() },
            background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#1a1a1a' : '#fff',
            color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000'
        });

        // 2. Kirim Data ke Laravel via AJAX (Fetch)
        fetch("{{ route('shop.checkout') }}", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                "X-CSRF-TOKEN": "{{ csrf_token() }}" // Token keamanan wajib Laravel
            },
            body: JSON.stringify({
                item_name: itemName,
                quantity: qty,
                total_price: totalPrice,
                payment_method: coin
            })
        })
        .then(response => response.json())
        .then(data => {
            // 3. Tampilkan Sukses jika berhasil
            Swal.fire({
                icon: 'success',
                title: 'Payment Received',
                text: 'Your order has been secured in our database.',
                confirmButtonColor: '#3F51B5',
                background: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#1a1a1a' : '#fff',
                color: document.documentElement.getAttribute('data-bs-theme') === 'dark' ? '#fff' : '#000',
            });
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire('Error', 'Something went wrong', 'error');
        });
    }
    
    </script>
</body>
</html>