<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta name="keywords"
        content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template" />
    <meta name="description"
        content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework" />
    <meta name="robots" content="noindex,nofollow" />
    <title>Product - ShinyFlakes</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Bootstrap JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>

    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <!-- Custom CSS -->
    <link href="../assets/dist/css/style.min.css" rel="stylesheet" />
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin6">
            <nav class="navbar top-navbar navbar-expand-md navbar-light">
                <div class="navbar-header" data-logobg="skin6">
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="dashboard">
                        <!-- Logo icon -->
                        <b class="logo-icon">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="../assets/images/logo-icon.png" alt="homepage" class="dark-logo"
                                style="width: 40px; height: auto;" />
                            <!-- Light Logo icon -->
                            <img src="../assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text -->
                        <span class="logo-text" style="margin-top: 10px;">
                            <!-- dark Logo text -->
                            <img src="../assets/images/logo-text.png" alt="homepage" class="dark-logo"
                                style="width: 135px; height: auto;" />
                            <!-- Light Logo text -->
                            <img src="../assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i
                            class="ti-menu ti-close"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-start me-auto">
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                        <style>
                            /* CSS Kustom Anda */
                            .nav-item.search-box a.nav-link:hover .mdi.mdi-magnify {
                                color: #3f51b5;
                                /* Ubah warna ikon ketika di-hover */
                            }

                            .nav-item.search-box a.nav-link:hover .font-16 {
                                color: #3f51b5;
                                /* Ubah warna teks ketika di-hover */
                            }
                        </style>
                        <li class="nav-item search-box">
                            <a class="nav-link waves-effect waves-dark" href="javascript:void(0)"><i
                                    class="mdi mdi-magnify me-1"></i>
                                <span class="font-16">Search</span></a>
                            <form class="app-search position-absolute">
                                <input type="text" class="form-control" placeholder="Search &amp; enter"
                                    style="color: #3f51b5" />
                                <a class="srh-btn"><i class="mdi mdi-window-close"></i></a>
                            </form>
                        </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="
                                nav-link
                                dropdown-toggle
                                text-muted
                                waves-effect waves-dark
                                pro-pic
                              "
                                href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown"
                                aria-expanded="false">
                                <img src="../assets/images/users/profile.png" alt="user" class="rounded-circle"
                                    width="31" />
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end user-dd animated"
                                aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="javascript:void(0)"><i style="color: #3f51b5"
                                        class="mdi mdi-emoticon-devil m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i style="color: #3f51b5"
                                        class="mdi mdi-logout-variant m-r-5 m-l-5"></i> Logout</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>

        <!-- End Topbar header -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <div style="margin-top: 20px; margin-bottom: 20px;">
            <aside class="left-sidebar" data-sidebarbg="skin6">
                <!-- Sidebar scroll-->
                <div class="scroll-sidebar" style="margin-top: 15px;">
                    <!-- Sidebar navigation-->
                    <nav class="sidebar-nav">
                        <ul id="sidebarnav">
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="dashboard"
                                    aria-expanded="false"><i class="mdi mdi-view-dashboard"
                                        style="color: #3f51b5;"></i><span class="hide-menu"
                                        style="color: #3f51b5; font-weight: 550;">Dashboard</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="produk"
                                    aria-expanded="false"><i class="mdi mdi-store" style="color: #3f51b5;"></i><span
                                        class="hide-menu" style="font-weight: 550;">Product</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pembelian"
                                    aria-expanded="false"><i class="mdi mdi-border-all"
                                        style="color: #3f51b5;"></i><span class="hide-menu"
                                        style="color: #3f51b5; font-weight: 550;">Sale</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="user"
                                    aria-expanded="false"><i class="mdi mdi-skull" style="color: #3f51b5;"></i><span
                                        class="hide-menu" style="color: #3f51b5; font-weight: 550;">User</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="drug"
                                    aria-expanded="false"><i class="mdi mdi-pill" style="color: #3f51b5;"></i><span
                                        class="hide-menu" style="color: #3f51b5; font-weight: 550;">Drug
                                        List</span></a>
                            </li>
                            <li class="sidebar-item">
                            </li>
                        </ul>
                    </nav>
                    <!-- End Sidebar navigation -->
                </div>
                <!-- End Sidebar scroll-->
            </aside>
            <!-- ============================================================== -->
            <!-- End Left Sidebar - style you can find in sidebar.scss  -->
            <!-- ============================================================== -->
            <!-- ============================================================== -->
            <!-- Page wrapper  -->
            <!-- ============================================================== -->
            <div class="page-wrapper">
                <!-- ============================================================== -->
                <!-- Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <div class="page-breadcrumb">
                    <div class="row align-items-center">
                        <div class="col-6">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0 d-flex align-items-center">
                                    <li class="breadcrumb-item">
                                        <a href="produk" class="link"><i
                                                class="mdi mdi-home-outline fs-4"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Product
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Product</h1>
                        </div>
                    </div>
                </div>
                <!-- Container fluid  -->
                <div class="container-fluid">
                    <!-- Start Page Content -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="text-end upgrade-btn">
                                        <button type="button" class="btn btn-primary text-white mdi mdi-cart-plus"
                                            data-bs-toggle="modal" data-bs-target="#staticBackdrop" target="_blank"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Add Product"
                                            id="tooltipBtn" style="border-radius: 100px"></button>
                                        <!-- Modal -->
                                        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
                                            data-bs-keyboard="false" tabindex="-1"
                                            aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content" style="border-radius: 10px;">
                                                    <div class="modal-header">
                                                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Add
                                                            Product</h1>
                                                        <button type="button" class="btn-close"
                                                            data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <form action="{{ route('tambah-produk') }}" method="POST">
                                                            @csrf
                                                            <div class="row g-3 mb-4">
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="nama_produk">Product Name <span
                                                                            style="color: #3f51b5;">*</span>
                                                                    </label><br>
                                                                    <input class="form-select"
                                                                        onmouseover="addStroke1(this)"
                                                                        onmouseout="removeStroke1(this)"
                                                                        onclick="addShadow1(this)"
                                                                        onblur="removeShadow1(this)" tabindex="0"
                                                                        class="form-control" aria-label="nama_produk"
                                                                        id="nama_produk" type="text"
                                                                        name="nama_produk"
                                                                        style="border-radius: 10px;">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="harga">Price <span
                                                                            style="color: #3f51b5;">*</span>
                                                                    </label><br>
                                                                    <input onmouseover="addStroke2(this)"
                                                                        onmouseout="removeStroke2(this)"
                                                                        onclick="addShadow2(this)"
                                                                        onblur="removeShadow2(this)" tabindex="0"
                                                                        type="text" class="form-control"
                                                                        aria-label="Harga" id="harga"
                                                                        name="harga" oninput="formatRupiah(event)"
                                                                        style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                            <div class="row g-3">
                                                                <div class="col-md-6 mb-4">
                                                                    <label for="image">Image Product <span
                                                                            style="color: #3f51b5;">*</span>
                                                                    </label><br>
                                                                    <input onmouseover="addStroke3(this)"
                                                                        onmouseout="removeStroke3(this)"
                                                                        onclick="addShadow3(this)"
                                                                        onblur="removeShadow3(this)" tabindex="0"
                                                                        type="file" class="form-control"
                                                                        aria-label="Image" id="image"
                                                                        name="image" style="border-radius: 10px;">
                                                                </div>
                                                                <div class="col-md-6 mb-3">
                                                                    <label for="stok">Stock <span
                                                                            style="color: #3f51b5;">*</span></label><br>
                                                                    <input onmouseover="addStroke4(this)"
                                                                        onmouseout="removeStroke4(this)"
                                                                        onclick="addShadow4(this)"
                                                                        onblur="removeShadow4(this)" tabindex="0"
                                                                        type="number" id="stok"
                                                                        class="form-control" aria-label="stok"
                                                                        style="border-radius: 10px;">
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-danger"
                                                                    data-bs-dismiss="modal"
                                                                    style="border-radius: 10px;">Cancel</button>
                                                                <button type="submit" class="btn btn-primary"
                                                                    style="border-radius: 10px;">Save</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        @if (Session::get('success'))
                                            <p
                                                style="padding: 5px 10px; background: green; color: white; margin: 10px">
                                                {{ Session::get('success') }}</p>
                                        @endif
                                    </div>
                                </div>

                                <h4 class="card-title" style="font-weight: medium;">Product Data</h4>
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center">#</th>
                                            {{-- <th scope="col">Image</th> --}}
                                            <th scope="col">Product Name</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Stock</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @php
                                            $no = 1;
                                        @endphp
                                        @foreach ($produks as $product)
                                            <tr>
                                                {{-- Nomor urut --}}
                                                <td>{{ $no++ }}</td>
                                                {{-- Nama produk --}}
                                                <td>{{ $product['nama_produk'] }}</td>
                                                {{-- Harga --}}
                                                <td>{{ $product['harga'] }}</td>
                                                {{-- Stok --}}
                                                <td>{{ $product['stok'] }}</td>
                                                {{-- Gambar --}}
                                                <td><img src="{{ $product->image }}" alt="image" class="w-20">
                                                </td>
                                                {{-- Tombol Edit --}}
                                                <td><button type="button"
                                                        class="btn btn-outline-warning mx-3">Edit</button></td>
                                                {{-- Tombol Update Stok --}}
                                                <td><button type="button" class="btn btn-outline-info mx-3">Update
                                                        Stock</button></td>
                                                {{-- Tombol Hapus --}}
                                                <td><button type="button"
                                                        class="btn btn-outline-danger mx-3">Delete</button></td>
                                            </tr>
                                        @endforeach
                                    </tbody>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <footer class="footer text-center">
                    All Rights Reserved by Shiny Flakes. Designed and Developed by
                    <a href="https://www.wrappixel.com">Azwan Maurizky</a>.
                </footer>

            </div>
        </div>
        <script src="../assets/libs/jquery/dist/jquery.min.js"></script>
        <!-- Bootstrap tether Core JavaScript -->
        <script src="../assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        <script src="../assets/dist/js/app-style-switcher.js"></script>
        <!--Wave Effects -->
        <script src="../assets/dist/js/waves.js"></script>
        <!--Menu sidebar -->
        <script src="../assets/dist/js/sidebarmenu.js"></script>
        <!--Custom JavaScript -->
        <script src="../assets/dist/js/custom.js"></script>
        <script>
            var tooltipTriggerEl = document.getElementById('tooltipBtn');
            var tooltip = new bootstrap.Tooltip(tooltipTriggerEl);

            tooltipTriggerEl.addEventListener('mouseenter', function() {
                tooltip.show();
            });

            tooltipTriggerEl.addEventListener('mouseleave', function() {
                tooltip.hide();
            });

            // Product Name JS
            function addStroke1(element) {
                if (!element.matches(":focus")) {
                    element.dataset.defaultBorder = element.style.border;
                    element.style.border = "1px solid #3f51b5";
                }
            }

            function removeStroke1(element) {
                if (!element.matches(":focus")) {
                    element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
                }
            }

            function addShadow1(element) {
                element.style.boxShadow = "0 0 10px rgba(63, 81, 181, 100)";
            }

            function removeShadow1(element) {
                element.style.boxShadow = "none";
                element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
            }

            // Price JS
            function addStroke2(element) {
                if (!element.matches(":focus")) {
                    element.dataset.defaultBorder = element.style.border;
                    element.style.border = "1px solid #3f51b5";
                }
            }

            function removeStroke2(element) {
                if (!element.matches(":focus")) {
                    element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
                }
            }

            function addShadow2(element) {
                element.style.boxShadow = "0 0 10px rgba(63, 81, 181, 100)";
            }

            function removeShadow2(element) {
                element.style.boxShadow = "none";
                element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
            }

            var harga = document.getElementById('harga');
            harga.addEventListener('keyup', function(e) {
                harga.value = formatRupiah(this.value, 'Rp. ');
            });

            function formatRupiah(angka, prefix) {
                // Mengonversi angka menjadi string sebelum memanipulasinya
                angka = angka.toString();

                var number_string = angka.replace(/[^,\d]/g, ''),
                    split = number_string.split(','),
                    sisa = split[0].length % 3,
                    rupiah = split[0].substr(0, sisa),
                    ribuan = split[0].substr(sisa).match(/\d{3}/g);

                if (ribuan) {
                    separator = sisa ? '.' : '';
                    rupiah += separator + ribuan.join('.');
                }

                rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
                return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
            }

            var harga = document.getElementById('harga');
            harga.addEventListener('input', function(e) {
                harga.value = formatRupiah(this.value, 'Rp. ');
            });

            function addStroke3(element) {
                if (!element.matches(":focus")) {
                    element.dataset.defaultBorder = element.style.border;
                    element.style.border = "1px solid #3f51b5";
                }
            }

            function removeStroke3(element) {
                if (!element.matches(":focus")) {
                    element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
                }
            }

            function addShadow3(element) {
                element.style.boxShadow = "0 0 10px rgba(63, 81, 181, 100)";
            }

            function removeShadow3(element) {
                element.style.boxShadow = "none";
                element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
            }

            // <!-- LOGIC BERAT (KG) -->
            // var beratInput = document.getElementById('beratInput');
            // beratInput.addEventListener('input', function(e) {   
            //     beratInput.value = formatBerat(this.value, 'Kg ');
            // });

            // function formatBerat(berat, prefix) {
            //     // Menghapus karakter non-angka dari input
            //     berat = berat.replace(/[^\d]/g, '');

            //     // Memasukkan titik setiap tiga digit dimulai dari belakang
            //     var formattedBerat = '';
            //     for (var i = berat.length - 1, j = 1; i >= 0; i--, j++) {
            //         formattedBerat = berat[i] + formattedBerat;
            //         if (j % 3 == 0 && i != 0) {
            //             formattedBerat = '.' + formattedBerat;
            //         }
            //     }
            //     return prefix + formattedBerat;
            // }

            function addStroke4(element) {
                if (!element.matches(":focus")) {
                    element.dataset.defaultBorder = element.style.border;
                    element.style.border = "1px solid #3f51b5";
                }
            }

            function removeStroke4(element) {
                if (!element.matches(":focus")) {
                    element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
                }
            }

            function addShadow4(element) {
                element.style.boxShadow = "0 0 10px rgba(63, 81, 181, 100)";
            }

            function removeShadow4(element) {
                element.style.boxShadow = "none";
                element.style.border = element.dataset.defaultBorder || '1px solid #ECF0F2';
            }
        </script>
</body>

</html>
