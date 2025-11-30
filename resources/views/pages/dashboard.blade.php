<!DOCTYPE html>
<html dir="ltr" lang="en">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Dashboard - ShinyFlakes</title>
    <link href="../assets/dist/css/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
      
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <a class="navbar-brand" href="dashboard">
                        <b class="logo-icon">
                            <img src="../assets/images/logo-icon.png" class="dark-logo" style="width: 40px;" />
                            <img src="../assets/images/logo-light-icon.png" class="light-logo" />
                        </b>
                        <span class="logo-text" style="margin-top: 10px;">
                            <img src="../assets/images/logo-text.png" class="dark-logo" style="width: 135px;" />
                            <img src="../assets/images/logo-light-text.png" class="light-logo" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)">
                                <i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span>
                            </a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter" style="color: #3f51b5" />
                                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/profile.png" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated">
                                <a class="dropdown-item" href="javascript:void(0)" style="cursor: default;">
                                    <i style="color: #3f51b5" class="mdi mdi-account-key m-r-5 m-l-5"></i> 
                                    {{ Auth::user()->role ?? 'User' }}
                                </a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#" onclick="confirmLogout(event)">
                                    <i style="color: #3f51b5" class="mdi mdi-logout-variant m-r-5 m-l-5"></i> Logout
                                </a>
                                <form id="logout-form" action="{{ route('actionlogout') }}" method="GET" style="display: none;">@csrf</form>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        <aside class="left-sidebar" data-sidebarbg="skin6">
            <div class="scroll-sidebar" style="margin-top: 15px;">
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
    
    <li class="sidebar-item {{ Request::is('dashboard') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('dashboard') ? 'active' : '' }}" 
           href="dashboard" 
           aria-expanded="false"
           style="{{ Request::is('dashboard') ? 'background-color: #3f51b5; border-radius: 10px; color: white !important;' : '' }}">
            
            <i class="mdi mdi-view-dashboard" style="color: {{ Request::is('dashboard') ? '#ffffff' : '#3f51b5' }};"></i>
            <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('dashboard') ? '#ffffff' : '#3f51b5' }};">Dashboard</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('produk*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('produk*') ? 'active' : '' }}" 
           href="produk" 
           aria-expanded="false"
           style="{{ Request::is('produk*') ? 'background-color: #3f51b5; border-radius: 10px; color: white !important;' : '' }}">
            
            <i class="mdi mdi-store" style="color: {{ Request::is('produk*') ? '#ffffff' : '#3f51b5' }};"></i>
            <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('produk*') ? '#ffffff' : '#3f51b5' }};">Product</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('pembelian*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('pembelian*') ? 'active' : '' }}" 
           href="pembelian" 
           aria-expanded="false"
           style="{{ Request::is('pembelian*') ? 'background-color: #3f51b5; border-radius: 10px; color: white !important;' : '' }}">
            
            <i class="mdi mdi-border-all" style="color: {{ Request::is('pembelian*') ? '#ffffff' : '#3f51b5' }};"></i>
            <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('pembelian*') ? '#ffffff' : '#3f51b5' }};">Transactions</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('user*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('user*') ? 'active' : '' }}" 
           href="user" 
           aria-expanded="false"
           style="{{ Request::is('user*') ? 'background-color: #3f51b5; border-radius: 10px; color: white !important;' : '' }}">
            
            <i class="mdi mdi-skull" style="color: {{ Request::is('user*') ? '#ffffff' : '#3f51b5' }};"></i>
            <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('user*') ? '#ffffff' : '#3f51b5' }};">Users</span>
        </a>
    </li>

    <li class="sidebar-item {{ Request::is('drug*') ? 'selected' : '' }}">
        <a class="sidebar-link waves-effect waves-dark sidebar-link {{ Request::is('drug*') ? 'active' : '' }}" 
           href="drug" 
           aria-expanded="false"
           style="{{ Request::is('drug*') ? 'background-color: #3f51b5; border-radius: 10px; color: white !important;' : '' }}">
            
            <i class="mdi mdi-pill" style="color: {{ Request::is('drug*') ? '#ffffff' : '#3f51b5' }};"></i>
            <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('drug*') ? '#ffffff' : '#3f51b5' }};">Drugs</span>
        </a>
    </li>

    <li class="text-center p-40 upgrade-btn">
        <a href="https://m.media-amazon.com/images/I/51WlnqNiCBL._AC_.jpg" class="btn d-block w-100 btn-danger text-white" target="_blank">21 +</a>
    </li>
</ul>
                </nav>
            </div>
        </aside>

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item">
                                    <a href="dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a>
                                </li>
                                <li class="breadcrumb-item active" aria-current="page">
                                    Dashboard
                                </li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Dashboard</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-12">
                        <div class="card bg-primary text-white shadow-sm">
                            <div class="card-body">
                                <h4 class="card-title text-white">Welcome Back, {{ Auth::user()->name }}!</h4>
                                <span>You have <span class="fw-bold text-warning">{{ $totalTransactions ?? 0 }} transactions</span> recorded. Keep pushing the product!</span>
                            </div>
                        </div>
                    </div>
                </div>

                <div style="margin-top: 10px; margin-bottom: 20px;">
                    <h1 class="mb-0 fw-bold text-center" style="font-family: 'Poppins', sans-serif; letter-spacing: -1px;">The Teenage Drug Lord</h1>
                </div>

                <div class="row">
                    <div class="col-lg-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Recent Incoming Orders</h4>
                                <span class="text-muted small">Real-time update from Darknet</span>
                            </div>
                            <div class="comment-widgets scrollable">
                                @forelse($recentTransactions as $t)
                                <div class="d-flex flex-row comment-row m-t-0 border-bottom p-3">
                                    <div class="p-2">
                                        <div style="width:50px; height:50px; background:#f0f0f0; border-radius:50%; display:flex; align-items:center; justify-content:center;">
                                            <i class="mdi mdi-incognito fs-3 text-dark"></i>
                                        </div>
                                    </div>
                                    <div class="comment-text w-100">
                                        <div class="d-flex justify-content-between">
                                            <h6 class="font-medium mb-1">{{ $t->customer_name }}</h6>
                                            <span class="text-muted small">{{ $t->created_at->diffForHumans() }}</span>
                                        </div>
                                        <span class="m-b-15 d-block text-muted">
                                            Ordered: <strong>{{ $t->item_name }}</strong> (x{{ $t->quantity }})
                                        </span>
                                        <div class="comment-footer mt-2 d-flex justify-content-between align-items-center">
                                            <span class="badge bg-light text-primary fw-bold border">Total: Rp {{ number_format($t->total_price) }}</span>
                                            <span class="action-icons">
                                                @if($t->payment_method == 'Bitcoin')
                                                    <i class="mdi mdi-bitcoin text-warning fs-4" title="BTC"></i>
                                                @else
                                                    <i class="mdi mdi-ethereum text-primary fs-4" title="ETH"></i>
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                @empty
                                <div class="p-4 text-center text-muted">No orders received yet.</div>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <div class="card h-100">
                            <div class="card-body">
                                <h4 class="card-title">Business Overview</h4>
                                <h6 class="card-subtitle">Lifetime Statistics</h6>
                                
                                <div class="mt-5 pb-3 d-flex align-items-center">
                                    <span class="btn btn-primary btn-circle d-flex align-items-center"><i class="mdi mdi-cash-multiple fs-4"></i></span>
                                    <div class="ms-3"><h5 class="mb-0 fw-bold">Total Revenue</h5><span class="text-muted fs-6">Gross Income</span></div>
                                    <div class="ms-auto"><span class="badge bg-success text-white px-3 py-2 fw-bold" style="font-size: 1rem;">Rp {{ number_format($totalRevenue ?? 0, 0, ',', '.') }}</span></div>
                                </div>

                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-warning btn-circle d-flex align-items-center"><i class="mdi mdi-star-circle fs-4 text-white"></i></span>
                                    <div class="ms-3"><h5 class="mb-0 fw-bold">Best Seller</h5><span class="text-muted fs-6">Most popular item</span></div>
                                    <div class="ms-auto"><span class="text-dark fw-bold">{{ $bestSellerName }}</span></div>
                                </div>

                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-success btn-circle d-flex align-items-center"><i class="mdi mdi-package-variant-closed text-white fs-4"></i></span>
                                    <div class="ms-3"><h5 class="mb-0 fw-bold">Warehouse Stock</h5><span class="text-muted fs-6">Total items available</span></div>
                                    <div class="ms-auto"><span class="badge bg-light text-dark border">{{ number_format($totalStock ?? 0) }} units</span></div>
                                </div>

                                <div class="py-3 d-flex align-items-center">
                                    <span class="btn btn-info btn-circle d-flex align-items-center"><i class="mdi mdi-receipt fs-4 text-white"></i></span>
                                    <div class="ms-3"><h5 class="mb-0 fw-bold">Total Orders</h5><span class="text-muted fs-6">Successful transactions</span></div>
                                    <div class="ms-auto"><span class="badge bg-light text-muted fw-bold fs-6"># {{ $totalTransactions ?? 0 }}</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                All Rights Reserved by Shiny Flakes. Designed and Developed by <a href="https://www.wrappixel.com">Azwan Maurizky</a>.
            </footer>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/app-style-switcher.js"></script>
    <script src="../assets/dist/js/waves.js"></script>
    <script src="../assets/dist/js/sidebarmenu.js"></script>
    <script src="../assets/dist/js/custom.js"></script>

    <script>
        function confirmLogout(e) {
            e.preventDefault();
            Swal.fire({
                title: 'Leaving so soon?',
                text: "Session will be terminated.",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3F51B5',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Logout!'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('logout-form').submit();
                }
            })
        }
    </script>
</body>
</html>