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
    <title>Sale - ShinyFlakes</title>
    <link rel="canonical" href="https://www.wrappixel.com/templates/Flexy-admin-lite/" />
    <!-- Bootstrap CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
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
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-account m-r-5 m-l-5"></i> My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-wallet m-r-5 m-l-5"></i> My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="mdi mdi-email m-r-5 m-l-5"></i> Inbox</a>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
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
                                        class="hide-menu" style="color: #3f51b5; font-weight: 550;">Product</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="pembelian"
                                    aria-expanded="false"><i class="mdi mdi-border-all"
                                        style="color: #3f51b5;"></i><span class="hide-menu"
                                        style="font-weight: 550;">Sale</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="user"
                                    aria-expanded="false"><i class="mdi mdi-skull" style="color: #3f51b5;"></i><span
                                        class="hide-menu" style="color: #3f51b5; font-weight: 550;">User</span></a>
                            </li>
                            <li class="sidebar-item">
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="drug"
                                    aria-expanded="false"><i class="mdi mdi-pill" style="color: #3f51b5;"></i><span
                                        class="hide-menu" style="color: #3f51b5; font-weight: 550;">Drug List</span></a>
                            </li>
                            <li class="sidebar-item">
                                {{-- <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="error-404.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-alert-outline"></i
                  ><span class="hide-menu">404</span></a
                >
              </li>
              <li class="text-center p-40 upgrade-btn">
                <a
                  href="https://www.wrappixel.com/templates/flexy-bootstrap-admin-template/"
                  class="btn d-block w-100 btn-danger text-white"
                  target="_blank"
                  >Upgrade to Pro</a
                > --}}
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
                                        <a href="pembelian" class="link"><i
                                                class="mdi mdi-home-outline fs-4"></i></a>
                                    </li>
                                    <li class="breadcrumb-item active" aria-current="page">
                                        Sale
                                    </li>
                                </ol>
                            </nav>
                            <h1 class="mb-0 fw-bold">Sale</h1>
                        </div>
                    </div>
                </div>
                <!-- ============================================================== -->
                <!-- End Bread crumb and right sidebar toggle -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Container fluid  -->
                <!-- ============================================================== -->
                <div class="container-fluid">
                    <!-- ============================================================== -->
                    <!-- Start Page Content -->
                    <!-- ============================================================== -->
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="col-12">
                                    <div class="text-end upgrade-btn">
                                        <a href=""
                                            class="btn btn-primary text-white mdi mdi-shredder" target="_blank"
                                            data-bs-toggle="tooltip" data-bs-placement="left" title="Export Sale (.xlsx)"
                                            id="tooltipBtn">
                                            {{-- <i class="mdi mdi-cart-plus"></i> --}}
                                        </a>
                                        <!-- Modal -->
                                        <div class="modal fade" id="tambahProdukModal" tabindex="-1"
                                            aria-labelledby="tambahProdukModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="tambahProdukModalLabel">Create Product</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                            aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                            
                                                            <div class="container">
                                                                <div class="row g-3 mb-4">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="nama_produk">Nama Produk
                                                                            *</label><br>
                                                                        <input type="text" class="form-control"
                                                                            aria-label="Nama Produk">
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="harga">Gambar Produk
                                                                            *</label><br>
                                                                        <input type="file" class="form-control"
                                                                            aria-label="Gambar Produk">
                                                                    </div>
                                                                </div>
                                                                <div class="row g-3">
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="harga">Harga *</label><br>
                                                                        <input type="text" class="form-control"
                                                                            aria-label="Harga" id="harga"
                                                                            oninput="formatHarga(event)">
                                                                    </div>
                                                                    <div class="col-md-6 mb-3">
                                                                        <label for="harga">Stok *</label><br>
                                                                        <input type="text" class="form-control"
                                                                            aria-label="Stok">
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-dismiss="modal">Batal</button>
                                                                <button type="submit"
                                                                    class="btn btn-primary">Simpan</button>
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
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th scope="col" style="text-align: center">#</th>
                                            <th scope="col">Customer Name</th>
                                            <th scope="col">Sale Date</th>
                                            <th scope="col">Total Price</th>
                                            <th scope="col">Created By</th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                            <th scope="col"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <th scope="row" style="text-align: center">1</th>
                                            <td>cawan tomsketer</td>
                                            <td>2027-07-27</td>
                                            <td>Rp. 1.25jt</td>
                                            <td>Admin</td>
                                            <td><button type="button"
                                                    class="btn btn-outline-warning mx-1">View</button></td>
                                            <td><button type="button" class="btn btn-outline-info mx-1">Download Proof</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: center">2</th>
                                            <td>Prabowo</td>
                                            <td>2020-02-02</td>
                                            <td>Rp. 210.000</td>
                                            <td>Presiden</td>
                                            <td><button type="button"
                                                    class="btn btn-outline-warning mx-1">View</button></td>
                                            <td><button type="button" class="btn btn-outline-info mx-1">Download Proof</button></td>
                                        </tr>
                                        <tr>
                                            <th scope="row" style="text-align: center">3</th>
                                            <td>Gibran</td>
                                            <td>02-02-02</td>
                                            <td>Rp. 2.020.202</td>
                                            <td>Wakil Presiden</td>
                                            <td><button type="button"
                                                    class="btn btn-outline-warning mx-1">View</button></td>
                                            <td><button type="button" class="btn btn-outline-info mx-1">Download Proof</button></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

                    <!-- ============================================================== -->
                    <!-- End PAge Content -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Right sidebar -->
                    <!-- ============================================================== -->
                    <!-- .right-sidebar -->
                    <!-- ============================================================== -->
                    <!-- End Right sidebar -->
                    <!-- ============================================================== -->
                </div>
                <!-- ============================================================== -->
                <!-- End Container fluid  -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- footer -->
                <!-- ============================================================== -->
                <footer class="footer text-center">
                    All Rights Reserved by Shiny Flakes. Designed and Developed by
                    <a href="https://www.wrappixel.com">Azwan Maurizky</a>.
                </footer>
                <!-- ============================================================== -->
                <!-- End footer -->
                <!-- ============================================================== -->
            </div>
            <!-- ============================================================== -->
            <!-- End Page wrapper  -->
            <!-- ============================================================== -->
        </div>
        <!-- ============================================================== -->
        <!-- End Wrapper -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- All Jquery -->
        <!-- ============================================================== -->
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
        </script>
</body>

</html>
