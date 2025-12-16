<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Detail | Shiny Flakes</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        /* CSS UTAMA */
        :root { --primary: #3F51B5; --bg-body: #ffffff; --text-main: #111111; --text-muted: #666666; --bg-dark: #050505; --text-dark: #e0e0e0; }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg-body); color: var(--text-main); transition: all 0.5s ease; }
        [data-bs-theme="dark"] body { background-color: var(--bg-dark); color: var(--text-dark); }
        [data-bs-theme="dark"] .navbar { background: rgba(20,20,20,0.95); border-bottom: 1px solid #333; }
        [data-bs-theme="dark"] .text-main { color: var(--text-dark) !important; }
        [data-bs-theme="dark"] .modal-content { background-color: #1a1a1a; border: 1px solid #333; color: white; }
        [data-bs-theme="dark"] .btn-close { filter: invert(1); }
        [data-bs-theme="dark"] .form-check-input:checked { background-color: var(--primary); border-color: var(--primary); }
        [data-bs-theme="dark"] .wallet-address { background: #000; border: 1px solid #333; color: #0f0; }
        .navbar { background: rgba(255,255,255,0.95); backdrop-filter: blur(10px); padding: 15px 0; border-bottom: 1px solid transparent; transition: 0.5s; }
        .nav-link { font-weight: 700; text-transform: uppercase; font-size: 0.85rem; letter-spacing: 1px; color: var(--text-main) !important; }
        .logo-icon { height: 40px; width: auto; margin-right: 10px; }
        .logo-text { height: 30px; width: auto; margin-top: 3px; }
        [data-bs-theme="dark"] .logo-text { filter: invert(1) brightness(2); }
        .image-gallery { background-color: #f9f9f9; padding: 20px; border-radius: 20px; box-shadow: 0 10px 30px rgba(0,0,0,0.05); transition: 0.3s; }
        [data-bs-theme="dark"] .image-gallery { background-color: #1a1a1a; border: 1px solid #333; }
        .main-img { width: 100%; height: auto; max-height: 450px; object-fit: contain; border-radius: 15px; margin-bottom: 20px; }
        .thumb-list { display: flex; gap: 10px; justify-content: start; }
        .thumb-item { width: 70px; height: 70px; border-radius: 10px; overflow: hidden; cursor: pointer; border: 2px solid transparent; transition: 0.2s; opacity: 0.7; background-color: #fff; }
        [data-bs-theme="dark"] .thumb-item { background-color: #2a2a2a; border: 1px solid #444; }
        .thumb-item.active, .thumb-item:hover { border-color: var(--primary); opacity: 1; }
        .thumb-item img { width: 100%; height: 100%; object-fit: contain; padding: 5px; }
        .product-title { font-weight: 800; font-size: 2.5rem; margin-bottom: 10px; line-height: 1.1; }
        .product-price { font-size: 1.8rem; font-weight: 700; color: var(--primary); margin-bottom: 20px; }
        .btn-buy { background-color: var(--primary); color: white; border: none; padding: 15px 0; width: 100%; border-radius: 50px; font-weight: 700; font-size: 1rem; box-shadow: 0 10px 20px rgba(63, 81, 181, 0.3); transition: 0.3s; }
        .btn-buy:hover { transform: translateY(-3px); box-shadow: 0 15px 30px rgba(63, 81, 181, 0.5); }
        .qty-wrapper { display: flex; align-items: center; border: 1px solid #ddd; border-radius: 50px; padding: 5px; width: 120px; justify-content: space-between; }
        [data-bs-theme="dark"] .qty-wrapper { border-color: #333; }
        .qty-btn { width: 30px; height: 30px; border-radius: 50%; border: none; background: transparent; font-weight: bold; color: inherit; }
        .qty-input { width: 40px; text-align: center; border: none; background: transparent; font-weight: bold; color: inherit; }
        .size-label { display: inline-block; width: 50px; height: 50px; line-height: 48px; text-align: center; border: 1px solid #ddd; border-radius: 10px; margin-right: 10px; cursor: pointer; font-weight: 600; transition: 0.3s; }
        input:checked + .size-label { background-color: var(--primary); color: white; border-color: var(--primary); }
        [data-bs-theme="dark"] .size-label { border-color: #333; color: #888; }
        .crypto-option { border: 2px solid #eee; border-radius: 15px; padding: 15px; cursor: pointer; display: flex; align-items: center; gap: 10px; transition: 0.3s; }
        .crypto-option.active { border-color: var(--primary); background-color: rgba(63, 81, 181, 0.05); }
        [data-bs-theme="dark"] .crypto-option { border-color: #333; }
        .wallet-address { font-family: monospace; font-size: 0.9rem; background: #eee; padding: 10px; border-radius: 8px; word-break: break-all; }
        .fade-in { animation: fadeIn 0.6s ease forwards; opacity: 0; }
        @keyframes fadeIn { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }

        /* --- CUSTOM DROPDOWN SHINY STYLE --- */
        .dropdown-menu { background: rgba(255, 255, 255, 0.95); backdrop-filter: blur(10px); border: 1px solid rgba(63, 81, 181, 0.1); border-radius: 16px; padding: 10px; min-width: 220px; box-shadow: 0 10px 40px rgba(63, 81, 181, 0.15); margin-top: 15px !important; animation: slideDown 0.3s cubic-bezier(0.165, 0.84, 0.44, 1); }
        .dropdown-header { color: #3f51b5; font-weight: 800; text-transform: uppercase; letter-spacing: 1px; font-size: 0.75rem; padding: 8px 16px; margin-bottom: 5px; }
        .dropdown-divider { border-top: 1px solid rgba(63, 81, 181, 0.1); margin: 5px 0; }
        .dropdown-item { border-radius: 10px; padding: 10px 16px; font-weight: 600; color: #555; transition: all 0.2s ease; display: flex; align-items: center; gap: 10px; }
        .dropdown-item:hover { background: rgba(63, 81, 181, 0.08); color: #3f51b5; transform: translateX(5px); }
        .dropdown-item i { font-size: 1.2rem; color: #3f51b5; transition: 0.2s; }
        .dropdown-item.text-danger { color: #ff4757; }
        .dropdown-item.text-danger:hover { background: rgba(255, 71, 87, 0.1); color: #ff4757; }
        .dropdown-item.text-danger i { color: #ff4757; }
        @keyframes slideDown { from { opacity: 0; transform: translateY(-10px); } to { opacity: 1; transform: translateY(0); } }
        .dropdown-menu::before { content: ''; position: absolute; top: -6px; right: 20px; width: 12px; height: 12px; background: white; transform: rotate(45deg); border-left: 1px solid rgba(63, 81, 181, 0.1); border-top: 1px solid rgba(63, 81, 181, 0.1); }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="{{ route('shop.index') }}">
                <i class="mdi mdi-arrow-left fs-4 text-main"></i>
                <span class="text-main fw-bold" style="font-size: 0.9rem;">BACK TO SHOP</span>
            </a>
            
            <div class="d-flex align-items-center justify-content-center flex-grow-1">
                <img src="{{ asset('assets/images/shinyflakes-icon 1.png') }}" class="logo-icon" alt="Icon">
                <img src="{{ asset('assets/images/logo-text.png') }}" class="logo-text" id="logoText" alt="Logo">
            </div>

            <div class="d-flex align-items-center gap-4">
                @guest
                    <a href="{{ route('login') }}" class="nav-link" title="Login">
                        <i class="mdi mdi-account-outline fs-4"></i>
                    </a>
                @else
                    <div class="dropdown">
                        <a href="#" class="nav-link" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-account-check fs-4 text-primary"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><h6 class="dropdown-header">Hi, {{ Auth::user()->name }}</h6></li>
                            
                            @if(Auth::user()->role == 'admin' || Auth::user()->role == 'kasir')
                                <li>
                                    <a class="dropdown-item" href="{{ route('dashboard') }}">
                                        <i class="mdi mdi-view-dashboard-outline"></i> 
                                        <span>Dashboard</span>
                                    </a>
                                </li>
                            @endif

                            <li><hr class="dropdown-divider"></li>

                            <li>
                                <a class="dropdown-item text-danger" href="{{ route('actionlogout') }}">
                                    <i class="mdi mdi-logout-variant"></i> 
                                    <span>Logout</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                @endguest
                
                <a href="#" class="nav-link position-relative">
                    <i class="mdi mdi-shopping-outline fs-4"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger" style="font-size: 10px;">0</span>
                </a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px; margin-bottom: 80px;">
        <nav aria-label="breadcrumb" class="mb-4 fade-in">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('shop.index') }}" class="text-decoration-none text-muted">Shop</a></li>
                <li class="breadcrumb-item"><a href="#" class="text-decoration-none text-muted" id="breadCat">Category</a></li>
                <li class="breadcrumb-item active" aria-current="page" id="breadName">Loading...</li>
            </ol>
        </nav>

        <div class="row align-items-start">
            <div class="col-lg-6 mb-5 mb-lg-0 fade-in">
                <div class="image-gallery">
                    <img src="" id="mainImage" class="main-img" alt="Product Image">
                    <div class="thumb-list">
                        <div class="thumb-item active" onclick="changeImage(this)">
                            <img src="" id="thumb1" alt="Front">
                        </div>
                        <div class="thumb-item" onclick="changeImage(this)">
                            <img src="" id="thumb2" alt="Back">
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 ps-lg-5 fade-in" style="animation-delay: 0.2s;">
                <span class="badge bg-success bg-opacity-10 text-success mb-2 px-3 py-2 rounded-pill fw-bold">In Stock</span>
                
                <h1 class="product-title text-main" id="prodName">Loading...</h1>
                
                <div class="d-flex align-items-center gap-2 mb-3">
                    <div class="text-warning small"><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i><i class="mdi mdi-star"></i></div>
                    <span class="text-muted small">(450 Reviews)</span>
                </div>
                
                <h2 class="product-price" id="prodPrice">Rp 0</h2>

                <p class="text-muted mb-4" id="prodDesc">Loading description...</p>

                <div class="mb-4">
                    <span class="fw-bold d-block mb-2 text-main" id="optionTitle">Select Size</span>
                    <div id="optionContainer" class="d-flex flex-wrap gap-2"></div>
                </div>

                <div class="d-flex gap-3 align-items-center pb-4 border-bottom border-secondary border-opacity-10">
                    <div class="qty-wrapper">
                        <button class="qty-btn" onclick="desc()">-</button>
                        <input type="text" class="qty-input" id="qty" value="1" readonly>
                        <button class="qty-btn" onclick="inc()">+</button>
                    </div>

                    @auth
                        <button class="btn-buy" data-bs-toggle="modal" data-bs-target="#paymentModal">
                            <i class="mdi mdi-flash me-2"></i> BUY NOW
                        </button>
                    @else
                        <button class="btn-buy" onclick="forceLogin()">
                            <i class="mdi mdi-login me-2"></i> LOGIN TO BUY
                        </button>
                    @endauth
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
            <div class="modal-content rounded-4 shadow-lg">
                <div class="modal-header border-bottom-0 pb-0">
                    <h5 class="modal-title fw-bold text-main"><i class="mdi mdi-lock text-primary"></i> Secure Payment</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body p-4 pt-2">
                    <p class="text-muted small mb-4">Select your preferred blockchain network:</p>
                    <div class="d-flex gap-3 mb-4">
                        <div class="crypto-option active flex-grow-1" id="opt-btc" onclick="selectCoin('btc')">
                            <i class="mdi mdi-bitcoin fs-3 text-warning"></i>
                            <div><h6 class="mb-0 fw-bold text-main">Bitcoin</h6><small class="text-muted">BTC Network</small></div>
                        </div>
                        <div class="crypto-option flex-grow-1" id="opt-eth" onclick="selectCoin('eth')">
                            <i class="mdi mdi-ethereum fs-3 text-primary"></i>
                            <div><h6 class="mb-0 fw-bold text-main">Ethereum</h6><small class="text-muted">ERC20</small></div>
                        </div>
                    </div>
                    <div class="text-center p-3 rounded-3 mb-3" style="background: rgba(63, 81, 181, 0.05);">
                        <h3 class="fw-bold text-main" id="modalPrice">Rp 0</h3>
                        <div class="bg-white p-2 d-inline-block rounded mb-3 border">
                            <img src="https://api.qrserver.com/v1/create-qr-code/?size=150x150&data=bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh" width="120" id="qrImage">
                        </div>
                        <p class="small text-muted mb-1 text-start">Wallet Address:</p>
                        <div class="input-group">
                            <div class="wallet-address flex-grow-1 text-truncate" id="walletAddr">bc1qxy2kgdygjrsqtzq2n0yrf2493p83kkfjhx0wlh</div>
                            <button class="btn btn-sm btn-outline-secondary" onclick="copyAddr()"><i class="mdi mdi-content-copy"></i></button>
                        </div>
                    </div>
                    <button class="btn btn-buy w-100 py-3 rounded-pill fw-bold" onclick="confirmPayment()">I Have Sent Payment</button>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
    // Listener Scroll Navbar
    window.addEventListener('scroll', function() {
        const navbar = document.querySelector('.navbar');
        if (window.scrollY > 50) { navbar.classList.add('scrolled'); } else { navbar.classList.remove('scrolled'); }
    });

    // --- DATASET DINAMIS DARI DATABASE ---
    const fakeProducts = @json($fashionProducts ?? []);
    const realProducts = @json($realProducts ?? []);

    // --- MENU CONFIG ---
    const menuFashion = `
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('New')">New Arrivals</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Jacket')">Jackets</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Denim')">Denim</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('T-Shirt')">T-Shirt</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Tracksuit')">Tracksuit</a></li>
    `;

    const menuReal = `
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Cocaine')">Stimulants</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Crystal')">Crystals</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Emoji')">Pills / XTC</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('Xanax')">Pharma</a></li>
        <li class="nav-item"><a class="nav-link" href="#" onclick="scrollToProduct('LSD')">Psychedelics</a></li>
    `;

    let clickCount = 0;
    let clickTimer;
    let isRealMode = false;
    const htmlElement = document.documentElement;

    // FUNGSI RENDER KARTU
    function renderProducts(products) {
        const container = document.getElementById('productContainer');
        
        // Animasi Keluar
        const cards = container.querySelectorAll('.product-col');
        cards.forEach((col, index) => { setTimeout(() => { col.classList.add('flipping-out'); }, index * 30); });
        
        setTimeout(() => {
            container.innerHTML = '';
            products.forEach((p) => {
                const col = createCard(p);
                col.classList.add('prepare-flip-in');
                container.appendChild(col);
            });
            
            // Animasi Masuk
            const newCards = container.querySelectorAll('.product-col');
            newCards.forEach((col, index) => {
                void col.offsetWidth;
                setTimeout(() => { col.classList.remove('prepare-flip-in'); }, index * 30);
            });
        }, 600);
    }

    function createCard(p) {
        const col = document.createElement('div');
        col.className = 'col-6 col-md-3 product-col'; 
        col.innerHTML = getCardHTML(p);
        return col;
    }

    function getCardHTML(p) {
        const url = "{{ url('/shop/detail') }}/" + p.id;
        // Badge: Kalau mode obat, warnanya merah
        const badgeColor = isRealMode ? 'background: #d32f2f;' : '';
        const badge = p.tag ? `<div class="discount-badge" style="${badgeColor}">${p.tag}</div>` : '';
        
        return `
            <div class="product-card" onclick="window.location.href='${url}'">
                ${badge}
                <div class="img-container">
                    <img src="${p.imgFront}" class="prod-img img-main" alt="${p.name}">
                    <img src="${p.imgBack}" class="prod-img img-hover" alt="${p.name} Back">
                </div>
                <div class="action-overlay">
                    <button class="action-btn"><i class="mdi mdi-heart-outline"></i></button>
                    <button class="action-btn"><i class="mdi mdi-cart-outline"></i></button>
                    <button class="action-btn"><i class="mdi mdi-arrow-right"></i></button>
                </div>
                <div class="prod-info">
                    <h5 class="prod-title text-truncate">${p.name}</h5>
                    <p class="prod-price">${p.price}</p>
                </div>
            </div>
        `;
    }

    function updateNavbar() {
        const navMenu = document.getElementById('navMenu');
        navMenu.classList.add('changing'); 
        setTimeout(() => {
            navMenu.innerHTML = isRealMode ? menuReal : menuFashion;
            navMenu.classList.remove('changing');
        }, 400); 
    }

    function scrollToProduct(keyword) {
        event.preventDefault();
        const titles = document.querySelectorAll('.prod-title');
        let targetElement = null;
        for (let title of titles) {
            if (title.textContent.toUpperCase().includes(keyword.toUpperCase())) {
                targetElement = title.closest('.product-col');
                break; 
            }
        }
        if (targetElement) {
            targetElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
            const card = targetElement.querySelector('.product-card');
            card.style.transition = "transform 0.3s";
            card.style.transform = "scale(1.05)";
            setTimeout(() => { card.style.transform = "scale(1)"; }, 500);
        }
    }

    function triggerFlash() {
        const flash = document.getElementById('flashOverlay');
        flash.style.opacity = '1';
        flash.style.background = isRealMode ? '#d32f2f' : 'white'; // Flash Merah pas masuk mode obat
        setTimeout(() => { flash.style.opacity = '0'; }, 500);
    }

    // --- INISIALISASI ---
    // Cek mode terakhir dari LocalStorage
    const savedMode = localStorage.getItem('shinyMode') === 'true';
    isRealMode = savedMode;

    if(isRealMode) {
        // SET MODE: RED/DARK (SAAT LOAD)
        renderProducts(realProducts);
        document.getElementById('navMenu').innerHTML = menuReal;
        htmlElement.setAttribute('data-bs-theme', 'dark');
        htmlElement.style.setProperty('--primary', '#d32f2f'); // UBAH VAR BIRU JADI MERAH
        
        // Setup Hero
        document.getElementById('heroTag').innerText = "RESTRICTED AREA";
        document.getElementById('heroTag').style.backgroundColor = "#d32f2f"; 
        document.getElementById('heroTitle').innerHTML = "PREMIUM<br>SUBSTANCES";
        document.getElementById('heroBg').style.backgroundImage = "url('https://zinniahealth.com/_next/image?url=https%3A%2F%2Fcdn.zinniahealth.com%2Fwp-content%2Fuploads%2F20230726112257%2Fshutterstock_2107289702.jpg&w=3840&q=75')";
    } else {
        // SET MODE: BLUE/LIGHT (SAAT LOAD)
        renderProducts(fakeProducts);
        document.getElementById('navMenu').innerHTML = menuFashion;
        htmlElement.setAttribute('data-bs-theme', 'light');
        htmlElement.style.setProperty('--primary', '#3F51B5'); // DEFAULT BIRU
    }

    // --- LOGIKA TRIGGER (KLIK 5X) ---
    document.getElementById('secretTrigger').addEventListener('click', function() {
        clickCount++;
        clearTimeout(clickTimer);

        if (clickCount === 5) {
            clickCount = 0;
            isRealMode = !isRealMode;
            localStorage.setItem('shinyMode', isRealMode);
            
            triggerFlash();
            updateNavbar(); 

            if(isRealMode) {
                // MASUK MODE OBAT (GANTI MERAH)
                renderProducts(realProducts);
                setTimeout(() => {
                    htmlElement.setAttribute('data-bs-theme', 'dark');
                    htmlElement.style.setProperty('--primary', '#d32f2f'); // WARNA JADI MERAH
                    
                    document.getElementById('heroTag').innerText = "RESTRICTED AREA";
                    document.getElementById('heroTag').style.backgroundColor = "#d32f2f"; 
                    document.getElementById('heroTitle').innerHTML = "PREMIUM<br>SUBSTANCES";
                    document.getElementById('heroBg').style.backgroundImage = "url('https://zinniahealth.com/_next/image?url=https%3A%2F%2Fcdn.zinniahealth.com%2Fwp-content%2Fuploads%2F20230726112257%2Fshutterstock_2107289702.jpg&w=3840&q=75')";
                }, 300);
            } else {
                // BALIK MODE FASHION (GANTI BIRU)
                renderProducts(fakeProducts);
                setTimeout(() => {
                    htmlElement.setAttribute('data-bs-theme', 'light');
                    htmlElement.style.setProperty('--primary', '#3F51B5'); // BALIK BIRU
                    
                    document.getElementById('heroTag').innerText = "New Collection";
                    document.getElementById('heroTag').style.backgroundColor = ""; 
                    document.getElementById('heroTitle').innerHTML = "DIVIN<br>BY DIVIN";
                    document.getElementById('heroBg').style.backgroundImage = "url('https://divinbydivin.com/cdn/shop/files/KEY_VISUAL.png?v=1764059568&width=1800')";
                }, 300);
            }
        } else {
            clickTimer = setTimeout(() => { clickCount = 0; }, 800);
        }
    });
</script>
</body>
</html>