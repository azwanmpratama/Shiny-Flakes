<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Drug List - ShinyFlakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
    
    <style>
        /* Override Warna Khusus Halaman Ini */
        .btn-danger-custom { background-color: #d32f2f; color: white; border: none; }
        .btn-danger-custom:hover { background-color: #b71c1c; color: white; }
        .text-danger-custom { color: #d32f2f !important; }
        .sidebar-link.active { background-color: #d32f2f !important; } /* Paksa sidebar merah */
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
                                <li class="breadcrumb-item"><a href="dashboard" class="link"><i class="mdi mdi-home-outline fs-4 text-danger-custom"></i></a></li>
                                <li class="breadcrumb-item active" aria-current="page">Drug List</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold text-danger-custom">Restricted Items</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card border-top border-danger border-2">
                            <div class="card-body">
                                
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title text-danger-custom"><i class="mdi mdi-flask me-2"></i>Substance Database</h4>
                                    <button type="button" class="btn btn-danger-custom text-white shadow-sm" data-bs-toggle="modal" data-bs-target="#addDrugModal" style="border-radius: 50px;">
                                        <i class="mdi mdi-plus me-1"></i> Add Substance
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover align-middle text-nowrap">
                                        <thead class="bg-danger text-white">
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Name</th>
                                                <th scope="col">Category</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($drugs as $drug)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <img src="{{ asset('assets/images/drug/' . $drug->image) }}" alt="drug" width="50" class="rounded border">
                                                </td>
                                                <td class="fw-bold">{{ $drug->name }}</td>
                                                <td>
                                                    <span class="badge bg-dark rounded-pill">{{ $drug->category ?? 'Stimulant' }}</span>
                                                </td>
                                                <td class="text-danger fw-bold">Rp {{ number_format($drug->price, 0, ',', '.') }}</td>
                                                <td>
                                                    <span class="badge bg-danger rounded-pill">{{ $drug->stock }} g</span>
                                                </td>
                                                <td class="text-center">
                                                    @if(Auth::user()->role == 'admin')
                                                        <form action="{{ route('drug.delete', $drug->id) }}" method="POST" onsubmit="return confirm('Destroy this substance record?');" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Destroy</button>
                                                        </form>
                                                    @else
                                                        <span class="text-muted small">Restricted</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="7" class="text-center text-muted py-5">
                                                    <i class="mdi mdi-flask-empty fs-1 text-danger-custom"></i>
                                                    <p class="text-danger-custom">No substances in inventory.</p>
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

    <div class="modal fade" id="addDrugModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header border-bottom-0 bg-danger text-white" style="border-radius: 15px 15px 0 0;">
                    <h5 class="modal-title fw-bold"><i class="mdi mdi-alert-circle-outline me-2"></i>New Substance Entry</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('drug.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold text-danger-custom">Substance Name</label>
                            <input type="text" class="form-control border-danger" name="name" required placeholder="Ex: Blue Crystal" style="border-radius: 10px;">
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-danger-custom">Category</label>
                            <select class="form-select border-danger" name="category" style="border-radius: 10px;">
                                <option value="Stimulants">Stimulants</option>
                                <option value="Psychedelics">Psychedelics</option>
                                <option value="Opioids">Opioids</option>
                                <option value="Cannabinoids">Cannabinoids</option>
                                <option value="Dissociatives">Dissociatives</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-danger-custom">Price (Rp)</label>
                                <input type="text" class="form-control border-danger" name="price" id="inputHargaDrug" required placeholder="0" style="border-radius: 10px;" onkeyup="formatRupiah(this)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold text-danger-custom">Stock (Gram/Pcs)</label>
                                <input type="number" class="form-control border-danger" name="stock" required placeholder="100" style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold text-danger-custom">Image Evidence</label>
                            <input type="file" class="form-control border-danger" name="image" required accept="image/*" style="border-radius: 10px;">
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger-custom rounded-pill px-4">Save to Database</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('assets/dist/js/app-style-switcher.js') }}"></script>
    <script src="{{ asset('assets/dist/js/waves.js') }}"></script>
    <script src="{{ asset('assets/dist/js/sidebarmenu.js') }}"></script>
    <script src="{{ asset('assets/dist/js/custom.js') }}"></script>

    <script>
        function formatRupiah(element) {
            let value = element.value.replace(/[^,\d]/g, '').toString();
            let split = value.split(',');
            let sisa = split[0].length % 3;
            let rupiah = split[0].substr(0, sisa);
            let ribuan = split[0].substr(sisa).match(/\d{3}/gi);
            if (ribuan) {
                separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }
            rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
            element.value = rupiah;
        }
    </script>
</body>
</html>