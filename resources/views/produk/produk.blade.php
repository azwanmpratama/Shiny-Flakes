<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Product - ShinyFlakes</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('assets/dist/css/style.min.css') }}" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@6.5.95/css/materialdesignicons.min.css" rel="stylesheet">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('assets/images/favicon.png') }}" />
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
                                <li class="breadcrumb-item active" aria-current="page">Product</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">Fashion Products</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                @if(session('successAdd'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('successAdd') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <h4 class="card-title">Product Data</h4>
                                    <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addProductModal" style="border-radius: 50px;">
                                        <i class="mdi mdi-plus me-1"></i> Add Product
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover align-middle text-nowrap">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Image</th>
                                                <th scope="col">Product Name</th>
                                                <th scope="col">Price</th>
                                                <th scope="col">Stock</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @forelse($produks as $produk)
                                            <tr>
                                                <th scope="row">{{ $loop->iteration }}</th>
                                                <td>
                                                    <img src="{{ asset('assets/images/products/' . $produk->image) }}" alt="product" width="50" class="rounded border">
                                                </td>
                                                <td class="fw-bold">{{ $produk->name ?? $produk->nama_produk }}</td>
                                                <td>Rp {{ number_format($produk->price ?? $produk->harga, 0, ',', '.') }}</td>
                                                <td>
                                                    <span class="badge bg-info rounded-pill">{{ $produk->stock ?? $produk->stok }} Units</span>
                                                </td>
                                                <td class="text-center">
                                                    @if(Auth::user()->role == 'admin')
                                                        <form action="{{ url('/produk/delete/' . $produk->id) }}" method="POST" onsubmit="return confirm('Delete this product?');" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                                        </form>
                                                    @else
                                                        <span class="text-muted small">Read Only</span>
                                                    @endif
                                                </td>
                                            </tr>
                                            @empty
                                            <tr>
                                                <td colspan="6" class="text-center text-muted py-5">
                                                    <i class="mdi mdi-package-variant fs-1"></i>
                                                    <p>No products available yet.</p>
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

    <div class="modal fade" id="addProductModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title fw-bold">Add New Product</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <form action="{{ route('tambah-produk') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body">
                        <div class="mb-3">
                            <label class="form-label fw-bold">Product Name</label>
                            <input type="text" class="form-control" name="nama_produk" required style="border-radius: 10px;">
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Price (Rp)</label>
                                <input type="text" class="form-control" name="harga" id="inputHarga" required placeholder="0" style="border-radius: 10px;" onkeyup="formatRupiah(this)">
                            </div>
                            <div class="col-md-6 mb-3">
                                <label class="form-label fw-bold">Stock</label>
                                <input type="number" class="form-control" name="stok" required style="border-radius: 10px;">
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label fw-bold">Front Image (Utama) <span class="text-danger">*</span></label>
                            <input type="file" class="form-control" name="image" required accept="image/*" style="border-radius: 10px;">
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-bold">Back Image (Hover Effect)</label>
                            <input type="file" class="form-control" name="image_back" accept="image/*" style="border-radius: 10px;">
                            <small class="text-muted">Jika kosong, gambar belakang akan sama dengan gambar depan.</small>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Save Product</button>
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