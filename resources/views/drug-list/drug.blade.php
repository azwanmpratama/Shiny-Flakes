<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Drug List - ShinyFlakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../assets/dist/css/style.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <style>
        .table-custom { border-collapse: separate; border-spacing: 0 10px; }
        .table-custom tbody tr { background-color: #fff; box-shadow: 0 2px 10px rgba(0,0,0,0.02); transition: 0.2s; }
        .table-custom tbody tr:hover { transform: translateY(-2px); box-shadow: 0 5px 15px rgba(63, 81, 181, 0.1); }
        .table-custom td { border: none; padding: 15px; vertical-align: middle; }
        .table-custom td:first-child { border-top-left-radius: 10px; border-bottom-left-radius: 10px; }
        .table-custom td:last-child { border-top-right-radius: 10px; border-bottom-right-radius: 10px; }
    </style>
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
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo" style="width: 40px; height: auto;" />
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <span class="logo-text" style="margin-top: 10px;">
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo" style="width: 135px; height: auto;" />
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto">
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i class="mdi mdi-magnify me-1"></i> <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter" style="color: #3f51b5" />
                                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)" style="cursor: default;">
                                    <i style="color: #3f51b5" class="mdi mdi-account-key m-r-5 m-l-5"></i> 
                                    {{ Auth::user()->role ?? 'Admin' }}
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
                                <span class="hide-menu" style="font-weight: 600; color: {{ Request::is('drug*') ? '#ffffff' : '#3f51b5' }};">Drug List</span>
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
                                <li class="breadcrumb-item"><a href="dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Drug List</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Master Data (Drug List)</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid" style="padding: 30px;">
                
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="card-title mb-1">Drug List Database</h4>
                        <span class="text-muted">Manage available substances for product input</span>
                    </div>
                    <button class="btn btn-primary rounded-pill px-4 py-2 shadow-sm" 
                        style="background-color: #3f51b5;" data-bs-toggle="modal" data-bs-target="#addDrugModal">
                        <i class="mdi mdi-plus-circle-outline me-2"></i> Add New Item
                    </button>
                </div>

                <div class="card border-0 bg-transparent">
                    <div class="table-responsive">
                        <table class="table table-custom">
                            <thead>
                                <tr class="text-muted small text-uppercase">
                                    <th class="ps-3">No</th>
                                    <th>Substance Name</th>
                                    <th>Category</th>
                                    <th>Registered Date</th>
                                    <th class="text-end pe-3">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($drugs as $item)
                                <tr>
                                    <td class="ps-3">{{ $loop->iteration }}</td>
                                    <td><span class="fw-bold text-dark">{{ $item->name }}</span></td>
                                    <td><span class="badge bg-light text-primary border">{{ $item->category }}</span></td>
                                    <td class="text-muted small">{{ $item->created_at->format('d M Y') }}</td>
                                    <td class="text-end pe-3">
                                        <form id="delete-form-{{ $item->id }}" action="{{ route('drug.delete', $item->id) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger border-0" onclick="confirmDelete('{{ $item->id }}')">
                                                <i class="mdi mdi-trash-can-outline fs-5"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="5" class="text-center py-5 text-muted">No data found in archives.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
            
            <footer class="footer text-center">
                All Rights Reserved by Shiny Flakes.
            </footer>
        </div>
    </div>

    <div class="modal fade" id="addDrugModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 rounded-4 p-3">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold">Add Substance</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body">
                    <form action="{{ route('drug.store') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label text-muted small fw-bold">Name</label>
                            <input type="text" name="name" class="form-control" placeholder="e.g. Methamphetamine" required>
                        </div>
                        <div class="mb-4">
                            <label class="form-label text-muted small fw-bold">Category</label>
                            <select name="category" class="form-select">
                                <option value="Pills">Pills / XTC</option>
                                <option value="Powder">Powder</option>
                                <option value="Organic">Organic</option>
                                <option value="Crystal">Crystal</option>
                                <option value="Liquid">Liquid</option>
                                <option value="Pharma">Pharma</option>
                                <option value="Weapon">Weapon</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary w-100 rounded-pill py-2" style="background-color: #3f51b5;">Save to Database</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
    <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../assets/dist/js/app-style-switcher.js"></script>
    <script src="../assets/dist/js/waves.js"></script>
    <script src="../assets/dist/js/sidebarmenu.js"></script>
    <script src="../assets/dist/js/custom.js"></script>

    <script>
        // Logic Logout Confirm
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

        // SweetAlert Success
        @if (Session::get('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: '{{ Session::get("success") }}',
                confirmButtonColor: '#3f51b5',
                timer: 2000,
                showConfirmButton: false
            });
        @endif

        // SweetAlert Delete Confirmation
        function confirmDelete(id) {
            Swal.fire({
                title: 'Destroy this Item?',
                text: "You won't be able to recover this substance data!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#3f51b5',
                confirmButtonText: 'Yes, destroy it!',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById('delete-form-' + id).submit();
                }
            })
        }
    </script>
</body>
</html>