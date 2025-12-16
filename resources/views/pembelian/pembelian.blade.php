<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Transactions - ShinyFlakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
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
                    <a class="navbar-brand" href="{{ route('dashboard') }}">
                        <b class="logo-icon">
                            <img src="{{ asset('assets/images/logo-icon.png') }}" class="dark-logo" style="width: 40px;" />
                        </b>
                        <span class="logo-text" style="margin-top: 10px;">
                            <img src="{{ asset('assets/images/logo-text.png') }}" class="dark-logo" style="width: 135px;" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto"></ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/profile.png') }}" class="rounded-circle" width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('actionlogout') }}"><i class="mdi mdi-logout m-r-5 m-l-5"></i> Logout</a>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>

        @include('layouts.sidebar')

        <div class="page-wrapper">
            <div class="page-breadcrumb">
                <div class="row align-items-center">
                    <div class="col-6">
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0 d-flex align-items-center">
                                <li class="breadcrumb-item"><a href="dashboard" class="link"><i class="mdi mdi-home-outline fs-4"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Transactions</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Incoming Orders</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="table table-hover align-middle text-nowrap">
                                        <thead class="table-light">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Date</th>
                                                <th scope="col">Customer</th>
                                                <th scope="col">Product Item</th>
                                                <th scope="col" class="text-center">Payment</th> <th scope="col">Total Price</th>
                                                <th scope="col">Status</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($transaksi as $trx)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>{{ $trx->created_at->format('d M Y, H:i') }}</td>
                                                <td>
                                                    <div class="d-flex align-items-center">
                                                        <img src="{{ asset('assets/images/users/profile.png') }}" class="rounded-circle" width="30" />
                                                        <span class="ms-2 fw-bold text-dark">{{ $trx->customer_name }}</span>
                                                    </div>
                                                </td>
                                                <td>
                                                    <span class="badge bg-primary rounded-pill me-1">{{ $trx->quantity }}x</span>
                                                    {{ $trx->item_name }}
                                                </td>
                                                
                                                <td class="text-center">
                                                    @if(strtolower($trx->payment_method) == 'bitcoin')
                                                        <i class="mdi mdi-bitcoin fs-2 text-warning" data-bs-toggle="tooltip" title="Bitcoin"></i>
                                                    @elseif(strtolower($trx->payment_method) == 'ethereum')
                                                        <i class="mdi mdi-ethereum fs-2 text-primary" data-bs-toggle="tooltip" title="Ethereum"></i>
                                                    @else
                                                        <i class="mdi mdi-credit-card fs-2 text-secondary" data-bs-toggle="tooltip" title="{{ $trx->payment_method }}"></i>
                                                    @endif
                                                </td>

                                                <td class="fw-bold text-success">
                                                    Rp {{ number_format($trx->total_price, 0, ',', '.') }}
                                                </td>
                                                <td>
                                                    <span class="badge bg-success bg-opacity-10 text-success px-3 py-2 rounded-pill">
                                                        <i class="mdi mdi-check-circle me-1"></i> {{ $trx->status ?? 'Paid' }}
                                                    </span>
                                                </td>
                                                <td class="text-center">
                                                    <a href="{{ route('pembelian.struk', $trx->id) }}" class="btn btn-outline-secondary btn-sm rounded-circle" title="Print Receipt">
                                                        <i class="mdi mdi-printer fs-5"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="8" class="text-center text-muted py-5">
                                                    <i class="mdi mdi-cart-off fs-1"></i>
                                                    <p class="mt-2">No transactions recorded yet.</p>
                                                </td>
                                            </tr>
                                            @endforelse
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                All Rights Reserved by Shiny Flakes.
            </footer>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>
    
    <script>
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
</body>
</html>