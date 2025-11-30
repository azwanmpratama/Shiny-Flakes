<!DOCTYPE html>
<html lang="en" data-bs-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHINY FLAKES | Official Store</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;700;900&display=swap" rel="stylesheet">
    
    <style>
        :root {
            --primary: #3F51B5; /* Indigo */
            --bg-light: #ffffff;
            --bg-card-light: #F2F2F7;
            --text-light: #1d1d1f;
            
            --bg-dark: #050505;
            --bg-card-dark: #121212;
            --text-dark: #f5f5f7;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-light);
            color: var(--text-light);
            transition: background-color 0.8s ease, color 0.8s ease;
            overflow-x: hidden;
            cursor: default; /* Kursor default, trail via JS */
        }

        /* --- 1. NAVBAR DENGAN EFEK BLUR SAAT SCROLL --- */
        .navbar {
            padding: 20px 0;
            background: transparent; /* Awal transparan */
            border-bottom: 1px solid transparent;
            transition: all 0.4s ease;
        }
        
        /* Class ini akan ditambahkan via JS saat scroll */
        .navbar.scrolled {
            background: rgba(255, 255, 255, 0.85); /* Putih transparan */
            backdrop-filter: blur(12px); /* EFEK BLUR */
            padding: 15px 0; /* Sedikit mengecil */
            box-shadow: 0 5px 20px rgba(0,0,0,0.05);
        }

        [data-bs-theme="dark"] .navbar.scrolled {
            background: rgba(0, 0, 0, 0.85);
            border-bottom: 1px solid #333;
        }

        /* Styling Logo Image */
        .navbar-brand img { transition: 0.3s; }
        .logo-icon { height: 45px; width: auto; margin-right: 8px; }
        .logo-text { height: 35px; width: auto; }
        
        /* Dark Mode Logo Invert (Agar teks hitam jadi putih) */
        [data-bs-theme="dark"] .logo-text { filter: invert(1) brightness(2); }

        .nav-link { font-weight: 600; font-size: 0.9rem; margin: 0 12px; color: var(--text-light) !important; transition: 0.3s; text-transform: uppercase; letter-spacing: 1px; }
        .nav-link:hover { color: var(--primary) !important; }
        
        .icon-btn { font-size: 1.4rem; color: var(--text-light); margin-left: 20px; transition: 0.3s; cursor: pointer; text-decoration: none; }
        .icon-btn:hover { color: var(--primary); transform: translateY(-2px); }

        /* --- 2. KURSOR BINTANG SEGI 4 --- */
        .cursor-star {
            position: fixed; width: 18px; height: 18px;
            background: var(--primary);
            /* Bintang Segi 4 (Diamond Star) */
            clip-path: polygon(50% 0%, 65% 35%, 100% 50%, 65% 65%, 50% 100%, 35% 65%, 0% 50%, 35% 35%);
            pointer-events: none; z-index: 10000; margin-top: -9px; margin-left: -9px;
            opacity: 0.7; animation: fadeTrail 0.5s linear forwards;
        }
        @keyframes fadeTrail { to { opacity: 0; transform: scale(0.2) rotate(90deg); } }

        /* --- HERO SECTION --- */
        .hero-wrap {
            position: relative; height: 500px; width: 100%;
            border-radius: 30px; overflow: hidden; margin-top: 40px; margin-bottom: 60px;
            transition: all 0.8s ease; 
        }
        .hero-bg { width: 100%; height: 100%; background-size: cover; background-position: center; transition: transform 10s ease; }
        .hero-wrap:hover .hero-bg { transform: scale(1.05); }
        .hero-content {
            position: absolute; bottom: 0; left: 0; width: 100%; padding: 60px;
            background: linear-gradient(to top, rgba(0,0,0,0.8), transparent);
            color: white; text-align: left;
        }
        .hero-title { font-weight: 900; font-size: 4rem; line-height: 1; margin-bottom: 10px; transition: 0.5s; }
        .hero-tag { background: var(--primary); padding: 5px 15px; border-radius: 20px; font-size: 0.8rem; font-weight: 700; text-transform: uppercase; letter-spacing: 1px; display: inline-block; margin-bottom: 15px; transition: 0.5s; }

        /* --- 3D FLIP CARD ANIMATION --- */
        .product-col { perspective: 1000px; }
        .product-card {
            background-color: var(--bg-card-light);
            border-radius: 24px; padding: 40px 20px; text-align: center;
            position: relative; overflow: hidden; height: 100%;
            border: 1px solid transparent;
            transition: transform 0.6s cubic-bezier(0.4, 0, 0.2, 1), background-color 0.6s, border-color 0.6s;
            transform-style: preserve-3d; backface-visibility: hidden;
        }
        /* State Flip */
        .product-col.flipping-out .product-card { transform: rotateY(90deg) scale(0.9); opacity: 0.5; }
        .product-col.prepare-flip-in .product-card { transform: rotateY(-90deg) scale(0.9); transition: none; }

        .img-area { height: 280px; display: flex; align-items: center; justify-content: center; margin-bottom: 25px; transition: 0.3s ease; }
        .prod-img { max-width: 90%; max-height: 100%; object-fit: contain; filter: drop-shadow(0 10px 20px rgba(0,0,0,0.08)); transition: 0.3s ease; }
        
        .action-overlay {
            position: absolute; top: 0; left: 0; width: 100%; height: 100%;
            display: flex; align-items: center; justify-content: center; gap: 12px;
            background: rgba(255,255,255,0.4); backdrop-filter: blur(4px);
            opacity: 0; visibility: hidden; transition: all 0.3s ease;
        }
        .action-btn {
            width: 50px; height: 50px; border-radius: 50%; background: white;
            display: flex; align-items: center; justify-content: center;
            font-size: 1.2rem; color: #111; border: none;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
            transform: translateY(20px); transition: 0.2s cubic-bezier(0.2, 0.8, 0.2, 1);
            cursor: pointer; text-decoration: none;
        }
        .action-btn:hover { background: var(--primary); color: white; transform: translateY(0) scale(1.1); }
        .product-card:hover .action-overlay { opacity: 1; visibility: visible; }
        .product-card:hover .action-btn { transform: translateY(0); }
        .product-card:hover .action-btn:nth-child(2) { transition-delay: 0.05s; }
        .product-card:hover .action-btn:nth-child(3) { transition-delay: 0.1s; }

        .prod-title { font-weight: 700; font-size: 1.1rem; margin-bottom: 5px; color: inherit; }
        .prod-price { font-weight: 500; color: #999; font-size: 1rem; }
        
        /* Dark Mode Elements */
        [data-bs-theme="dark"] body { background-color: var(--bg-dark); color: var(--text-dark); }
        [data-bs-theme="dark"] .product-card { background-color: var(--bg-card-dark); border: 1px solid #222; }
        [data-bs-theme="dark"] .action-btn { background: #222; color: white; border: 1px solid #333; }
        [data-bs-theme="dark"] .action-btn:hover { background: var(--primary); border-color: var(--primary); }
        [data-bs-theme="dark"] .nav-link { color: #888 !important; }
        [data-bs-theme="dark"] .nav-link:hover { color: #fff !important; }
        [data-bs-theme="dark"] .icon-btn { color: #fff; }
        [data-bs-theme="dark"] .action-overlay { background: rgba(0,0,0,0.6); }
        [data-bs-theme="dark"] .offcanvas { background-color: #111; color: #fff; border-left: 1px solid #333; }
        [data-bs-theme="dark"] .btn-close { filter: invert(1); }

        #secretTrigger { cursor: pointer; user-select: none; }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center" id="secretTrigger">
                <img src="{{ asset('assets/images/shinyflakes-icon 1.png') }}" class="logo-icon" alt="Icon">
                <img src="{{ asset('assets/images/logo-text.png') }}" class="logo-text" alt="Logo">
            </a>
            
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navContent">
                <span class="mdi mdi-menu"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-center" id="navContent">
                <ul class="navbar-nav">
                    <li class="nav-item"><a class="nav-link" href="#">New Arrivals</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Brands</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Apparel</a></li>
                    <li class="nav-item"><a class="nav-link" href="#">Sale</a></li>
                </ul>
            </div>

            <div class="d-flex align-items-center">
                <div class="icon-btn position-relative" data-bs-toggle="offcanvas" data-bs-target="#cartOffcanvas">
                    <i class="mdi mdi-shopping-outline"></i>
                    <span class="position-absolute top-0 start-100 translate-middle p-1 bg-primary rounded-circle border border-white" style="width:10px; height:10px;"></span>
                </div>
                <a href="{{ route('login') }}" class="icon-btn"><i class="mdi mdi-account-outline"></i></a>
            </div>
        </div>
    </nav>

    <div class="container" style="margin-top: 100px;">
        <div class="hero-wrap">
            <div class="hero-bg" id="heroBg" style="background-image: url('https://images.unsplash.com/photo-1558769132-cb1aea458c5e?auto=format&fit=crop&w=1350&q=80');"></div>
            <div class="hero-content">
                <span class="hero-tag" id="heroTag">New Collection</span>
                <h1 class="hero-title" id="heroTitle">STREET<br>CULTURE</h1>
            </div>
        </div>

        <div class="row g-4 mb-5" id="productContainer">
            </div>
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
        // --- SCROLL BLUR NAVBAR LOGIC ---
        window.addEventListener('scroll', function() {
            const navbar = document.querySelector('.navbar');
            if (window.scrollY > 50) {
                navbar.classList.add('scrolled');
            } else {
                navbar.classList.remove('scrolled');
            }
        });

        // --- CUSTOM CURSOR (BINTANG 4 SUDUT) ---
        document.addEventListener('mousemove', (e) => {
            if(Math.random() > 0.3) return; // Optimasi performa
            const star = document.createElement('div');
            star.classList.add('cursor-star');
            star.style.left = e.clientX + 'px';
            star.style.top = e.clientY + 'px';
            document.body.appendChild(star);
            setTimeout(() => star.remove(), 500);
        });

        // --- DATABASE ---
        // 1. KAMUFLASE (Streetwear: Corteiz & Divin)
        const fakeProducts = [
            { id: 1, name: "Divin Archive Puffer", price: "Rp 2.500.000", img: "https://images.unsplash.com/photo-1591047139829-d91aecb6caea?auto=format&fit=crop&w=500&q=80", tag: "NEW" },
            { id: 2, name: "Corteiz Hoodie Black", price: "Rp 1.800.000", img: "https://images.unsplash.com/photo-1556905055-8f358a7a47b2?auto=format&fit=crop&w=500&q=80", tag: "" },
            { id: 3, name: "Utility Cargo Pants", price: "Rp 1.200.000", img: "https://images.unsplash.com/photo-1624378439575-d8705ad7ae80?auto=format&fit=crop&w=500&q=80", tag: "HOT" },
            { id: 4, name: "Guerilla Balaclava", price: "Rp 650.000", img: "https://images.unsplash.com/photo-1611576628234-9273c0993096?auto=format&fit=crop&w=500&q=80", tag: "" },
        ];

        // 2. REAL (Shiny Flakes - Drugs)
        const realProducts = [
            { id: 101, name: "Shiny Flakes XTC", price: "Rp 450.000", img: "{{ asset('assets/images/drug/d1.png') }}", tag: "PURE" },
            { id: 102, name: "Magic Mushroom", price: "Rp 250.000", img: "{{ asset('assets/images/drug/d2.png') }}", tag: "BIO" },
            { id: 103, name: "Blue Punisher", price: "Rp 500.000", img: "{{ asset('assets/images/drug/d3.png') }}", tag: "STRONG" },
            { id: 104, name: "Peruvian Flake", price: "Rp 1.800.000", img: "{{ asset('assets/images/drug/d4.png') }}", tag: "98%" },
        ];

        let clickCount = 0;
        let clickTimer;
        let isRealMode = false;
        const htmlElement = document.documentElement;

        // RENDER PRODUCTS
        function renderProducts(products, animate = false) {
            const container = document.getElementById('productContainer');
            
            if(container.children.length === 0) {
                products.forEach((p) => container.appendChild(createCard(p)));
            } else {
                const cards = container.querySelectorAll('.product-col');
                cards.forEach((col, index) => {
                    setTimeout(() => { col.classList.add('flipping-out'); }, index * 100);
                    setTimeout(() => {
                        col.innerHTML = getCardHTML(products[index]);
                        col.classList.add('prepare-flip-in');
                        col.classList.remove('flipping-out');
                        void col.offsetWidth;
                        col.classList.remove('prepare-flip-in');
                    }, (index * 100) + 400);
                });
            }
        }

        function createCard(p) {
            const col = document.createElement('div');
            col.className = 'col-6 col-md-3 product-col';
            col.innerHTML = getCardHTML(p);
            return col;
        }

        function getCardHTML(p) {
            const badge = p.tag ? `<div class="badge bg-dark text-white position-absolute top-0 start-0 m-3 rounded-pill px-3">${p.tag}</div>` : '';
            // Sesuaikan badge untuk dark mode nanti via CSS
            
            return `
                <div class="product-card">
                    ${p.tag ? '<span class="badge bg-secondary position-absolute top-0 start-0 m-4 rounded-pill">'+p.tag+'</span>' : ''}
                    <div class="img-area"><img src="${p.img}" class="prod-img" alt="${p.name}"></div>
                    <div class="action-overlay">
                        <button class="action-btn"><i class="mdi mdi-heart-outline"></i></button>
                        <a href="{{ route('shop.detail') }}" class="action-btn"><i class="mdi mdi-cart-outline"></i></a>
                        <a href="{{ route('shop.detail') }}" class="action-btn"><i class="mdi mdi-arrow-right"></i></a>
                    </div>
                    <div class="mt-3">
                        <h5 class="prod-title text-truncate">${p.name}</h5>
                        <p class="prod-price">${p.price}</p>
                    </div>
                </div>
            `;
        }

        // INITIAL LOAD
        renderProducts(fakeProducts);
        localStorage.setItem('shinyMode', 'false');

        // TRIGGER LOGIC (FLIP CARD)
        document.getElementById('secretTrigger').addEventListener('click', function() {
            clickCount++;
            clearTimeout(clickTimer);

            if (clickCount === 5) {
                clickCount = 0;
                isRealMode = !isRealMode;
                localStorage.setItem('shinyMode', isRealMode);

                if(isRealMode) {
                    // MODE DRUG
                    renderProducts(realProducts);
                    setTimeout(() => {
                        htmlElement.setAttribute('data-bs-theme', 'dark');
                        document.getElementById('heroTag').innerText = "Restricted Area";
                        document.getElementById('heroTag').style.backgroundColor = "#B90000"; 
                        document.getElementById('heroTitle').innerHTML = "PREMIUM<br>SUBSTANCES";
                        document.getElementById('heroBg').style.backgroundImage = "url('https://images.unsplash.com/photo-1618005182384-a83a8bd57fbe?auto=format&fit=crop&w=1350&q=80')";
                    }, 300);
                } else {
                    // MODE FASHION
                    renderProducts(fakeProducts);
                    setTimeout(() => {
                        htmlElement.setAttribute('data-bs-theme', 'light');
                        document.getElementById('heroTag').innerText = "New Collection";
                        document.getElementById('heroTag').style.backgroundColor = ""; 
                        document.getElementById('heroTitle').innerHTML = "STREET<br>CULTURE";
                        document.getElementById('heroBg').style.backgroundImage = "url('https://images.unsplash.com/photo-1558769132-cb1aea458c5e?auto=format&fit=crop&w=1350&q=80')";
                    }, 300);
                }
            } else {
                clickTimer = setTimeout(() => { clickCount = 0; }, 800);
            }
        });
    </script>
</body>
</html>