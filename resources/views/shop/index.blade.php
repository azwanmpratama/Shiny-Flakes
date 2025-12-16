<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shop | Shiny Flakes</title>
    <link rel="icon" type="image/svg+xml" href="{{ asset('assets/images/favicon.svg') }}">
    <link rel="icon" type="image/png" href="{{ asset('assets/images/favicon.png') }}">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #3F51B5;
            --bg-light: #ffffff; --bg-card-light: #F2F2F7; --text-light: #1d1d1f;
            --bg-dark: #050505; --bg-card-dark: #121212; --text-dark: #f5f5f7;
        }
        body { font-family: 'Outfit', sans-serif; background-color: var(--bg-light); color: var(--text-light); transition: background-color 0.8s ease, color 0.8s ease; overflow-x: hidden; cursor: default; }
        
        /* NAVBAR */
        .navbar { padding: 20px 0; background: transparent; border-bottom: 1px solid transparent; transition: all 0.4s ease; position: fixed; width: 100%; top: 0; z-index: 1030; }
        .navbar.scrolled { background: rgba(255, 255, 255, 0.85); backdrop-filter: blur(12px); padding: 15px 0; box-shadow: 0 5px 20px rgba(0,0,0,0.05); }
        [data-bs-theme="dark"] .navbar.scrolled { background: rgba(0, 0, 0, 0.85); border-bottom: 1px solid #333; }
        
        /* LOGO */
        .navbar-brand img { transition: 0.3s; }
        .logo-icon { height: 50px; width: auto; margin-right: 10px; }
        .logo-text { height: 35px; width: auto; margin-top: 10px; }
        [data-bs-theme="dark"] .logo-text { filter: invert(1) brightness(2); }
        #secretTrigger { cursor: pointer; user-select: none; }

        /* MENU & ANIMATION */
        @media (min-width: 992px) { .centered-nav { position: absolute; left: 50%; transform: translateX(-50%); } }
        .nav-link { font-weight: 600; font-size: 0.9rem; margin: 0 15px; color: var(--text-light) !important; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px; cursor: pointer; position: relative; display: inline-block; }
        .nav-link:hover { color: var(--primary) !important; }
        .nav-link::after { content: ''; position: absolute; width: 0; height: 2px; bottom: -4px; left: 50%; background-color: var(--primary); transition: width 0.3s ease-in-out, left 0.3s ease-in-out; transform: translateX(-50%); }
        .nav-link:hover::after { width: 100%; }
        [data-bs-theme="dark"] .nav-link { color: #888 !important; }
        [data-bs-theme="dark"] .nav-link:hover { color: var(--primary) !important; text-shadow: 0 0 10px rgba(63, 81, 181, 0.6); }
        #navMenu { transition: opacity 0.4s ease, transform 0.4s ease; opacity: 1; transform: translateY(0); }
        #navMenu.changing { opacity: 0; transform: translateY(-10px); }

        /* HERO */
        .hero-wrap { position: relative; height: 500px; width: 100%; border-radius: 30px; overflow: hidden; margin-top: 40px; margin-bottom: 60px; transition: all 0.8s ease; }
        .hero-bg { width: 100%; height: 100%; background-size: cover; background-position: center; transition: transform 10s ease; }
        .hero-wrap:hover .hero-bg { transform: scale(1.05); }
        .hero-content { position: absolute; bottom: 0; left: 0; width: 100%; padding: 60px; background: linear-gradient(to top, rgba(0,0,0,0.8), transparent); color: white; text-align: left; }
        .hero-title { font-weight: 900; font-size: 4rem; line-height: 1; margin-bottom: 10px; transition: 0.5s; }
        .hero-tag { background: var(--primary); padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: inline-block; margin-bottom: 15px; transition: 0.5s; }

        /* PRODUCT CARDS */
        .product-col { perspective: 1000px; transition: 0.5s; }
        .product-col .product-card { transform: rotateY(0deg); opacity: 1; transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), opacity 0.6s; }
        .product-col.flipping-out .product-card { transform: rotateY(90deg) scale(0.8); opacity: 0; }
        .product-col.prepare-flip-in .product-card { transform: rotateY(-90deg) scale(0.8); opacity: 0; transition: none; }
        .product-card { background-color: var(--bg-card-light); border-radius: 15px; padding: 0 0 20px 0; text-align: center; position: relative; overflow: hidden; height: 100%; border: 1px solid transparent; cursor: pointer; transform-style: preserve-3d; }
        .img-container { position: relative; width: 100%; padding-bottom: 125%; overflow: hidden; border-radius: 15px 15px 0 0; background: #f0f0f0; }
        .prod-img { position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover; transition: opacity 0.4s ease-in-out, transform 0.6s ease; }
        .img-hover { opacity: 0; z-index: 2; }
        .product-card:hover .img-hover { opacity: 1; } .product-card:hover .img-main { opacity: 0; } .product-card:hover .prod-img { transform: scale(1.05); }
        .action-overlay { position: absolute; bottom: 15px; left: 0; right: 0; display: flex; justify-content: center; gap: 10px; opacity: 0; transform: translateY(20px); transition: all 0.3s ease; z-index: 3; }
        .product-card:hover .action-overlay { opacity: 1; transform: translateY(0); }
        .action-btn { width: 40px; height: 40px; border-radius: 50%; background: white; display: flex; align-items: center; justify-content: center; font-size: 1.1rem; color: #111; border: none; box-shadow: 0 4px 10px rgba(0,0,0,0.15); transition: 0.2s; }
        .action-btn:hover { background: var(--primary); color: white; }
        .prod-info { padding: 15px 15px 0 15px; text-align: left; }
        .prod-title { font-weight: 700; font-size: 1rem; margin-bottom: 5px; color: inherit; text-transform: uppercase; letter-spacing: 0.5px; }
        .prod-price { font-weight: 500; color: #666; font-size: 0.95rem; }
        .discount-badge { position: absolute; top: 10px; left: 10px; z-index: 5; background: #111; color: white; padding: 4px 10px; border-radius: 4px; font-size: 0.7rem; font-weight: 700; text-transform: uppercase; }

        /* DARK MODE */
        [data-bs-theme="dark"] body { background-color: var(--bg-dark); color: var(--text-dark); }
        [data-bs-theme="dark"] .product-card { background-color: var(--bg-card-dark); border: 1px solid #222; }
        [data-bs-theme="dark"] .img-container { background: #1a1a1a; }
        [data-bs-theme="dark"] .action-btn { background: #222; color: white; border: 1px solid #333; }
        [data-bs-theme="dark"] .action-btn:hover { background: var(--primary); border-color: var(--primary); }
        [data-bs-theme="dark"] .icon-btn { color: #fff; }
        [data-bs-theme="dark"] .offcanvas { background-color: #111; color: #fff; border-left: 1px solid #333; }
        [data-bs-theme="dark"] .btn-close { filter: invert(1); }
        [data-bs-theme="dark"] .discount-badge { background: var(--primary); }
        .icon-btn { font-size: 1.4rem; color: var(--text-light); margin-left: 20px; transition: 0.3s; cursor: pointer; text-decoration: none; }
        .icon-btn:hover { color: var(--primary); transform: translateY(-2px); }

        #flashOverlay { position: fixed; top: 0; left: 0; width: 100vw; height: 100vh; background: white; z-index: 9999; pointer-events: none; opacity: 0; transition: opacity 0.5s ease; }

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

    <div id="flashOverlay"></div>

    <nav class="navbar navbar-expand-lg">
        <div class="container position-relative">
            <a class="navbar-brand d-flex align-items-center" id="secretTrigger">
                <img src="{{ asset('assets/images/shinyflakes-icon 1.png') }}" class="logo-icon" alt="Icon">
                <img src="{{ asset('assets/images/logo-text.png') }}" class="logo-text" id="logoImage" alt="Logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="mdi mdi-menu"></span>
            </button>

            <div class="collapse navbar-collapse centered-nav" id="navContent">
                <ul class="navbar-nav mx-auto" id="navMenu"></ul>
            </div>

            <div class="d-flex align-items-center ms-auto">
                <div class="icon-btn position-relative me-3" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                    <i class="mdi mdi-shopping-outline"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-primary rounded-circle border border-white" style="width:10px; height:10px;"></span>
                </div>

                @guest
                    <a href="{{ route('login') }}" class="icon-btn" title="Login">
                        <i class="mdi mdi-account-outline"></i>
                    </a>
                @else
                    <div class="dropdown">
                        <a href="#" class="icon-btn" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="mdi mdi-account-check" style="color: var(--primary);"></i>
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
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        <div class="hero-wrap">
            <div class="hero-bg" id="heroBg" style="background-image: url('https://divinbydivin.com/cdn/shop/files/KEY_VISUAL.png?v=1764059568&width=1800');"></div>
            <div class="hero-content">
                <span class="hero-tag" id="heroTag">New Collection</span>
                <h1 class="hero-title" id="heroTitle">DIVIN<br>BY DIVIN</h1>
            </div>
        </div>

        <div class="row g-4 mb-5" id="productContainer"></div>
    </div>

    <div class="offcanvas offcanvas-end" tabindex="-1" id="cartOffcanvas" style="border-radius: 20px 0 0 20px;">
        <div class="offcanvas-header border-bottom">
            <h5 class="offcanvas-title fw-bold">Shopping Bag</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-flex flex-column justify-content-center align-items-center text-muted opacity-50">
            <i class="mdi mdi-shopping-outline fs-1 mb-3"></i>
            <p>Your bag is empty.</p>
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