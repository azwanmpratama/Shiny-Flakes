<!DOCTYPE html>
<html dir="ltr" lang="en">
  <head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta
      name="keywords"
      content="wrappixel, admin dashboard, html css dashboard, web dashboard, bootstrap 5 admin, bootstrap 5, css3 dashboard, bootstrap 5 dashboard, Flexy lite admin bootstrap 5 dashboard, frontend, responsive bootstrap 5 admin template, Flexy admin lite design, Flexy admin lite dashboard bootstrap 5 dashboard template"
    />
    <meta
      name="description"
      content="Flexy Admin Lite is powerful and clean admin dashboard template, inpired from Bootstrap Framework"
    />
    <meta name="robots" content="noindex,nofollow" />
    <title>Dashboard - ShinyFlakes</title>
    <link
      rel="canonical"
      href="https://www.wrappixel.com/templates/Flexy-admin-lite/"
    />
    <!-- Favicon icon -->
    <link
      rel="icon"
      type="image/png"
      sizes="16x16"
      href="../assets/images/favicon.png"
    />
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
    <div
      id="main-wrapper"
      data-layout="vertical"
      data-navbarbg="skin5"
      data-sidebartype="full"
      data-sidebar-position="absolute"
      data-header-position="absolute"
      data-boxed-layout="full"
    >
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
                <img
                  src="../assets/images/logo-icon.png"
                  alt="homepage"
                  class="dark-logo"
                  style="width: 40px; height: auto;"
                />
                <!-- Light Logo icon -->
                <img
                  src="../assets/images/logo-light-icon.png"
                  alt="homepage"
                  class="light-logo"
                />
              </b>
              <!--End Logo icon -->
              <!-- Logo text -->
              <span class="logo-text" style="margin-top: 10px;">
                <!-- dark Logo text -->
                <img
                  src="../assets/images/logo-text.png"
                  alt="homepage"
                  class="dark-logo"
                  style="width: 135px; height: auto;"
                />
                <!-- Light Logo text -->
                <img
                  src="../assets/images/logo-light-text.png"
                  class="light-logo"
                  alt="homepage"
                />
              </span>
            </a>
            <!-- ============================================================== -->
            <!-- End Logo -->
            <!-- ============================================================== -->
            <!-- This is for the sidebar toggle which is visible on mobile only -->
            <a
              class="nav-toggler waves-effect waves-light d-block d-md-none"
              href="javascript:void(0)"
              ><i class="ti-menu ti-close"></i
            ></a>
          </div>
          <!-- ============================================================== -->
          <!-- End Logo -->
          <!-- ============================================================== -->
          <div
            class="navbar-collapse collapse"
            id="navbarSupportedContent"
            data-navbarbg="skin5"
          >
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
                <a
                  class="
                    nav-link
                    dropdown-toggle
                    text-muted
                    waves-effect waves-dark
                    pro-pic
                  "
                  href="#"
                  id="navbarDropdown"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  <img
                    src="../assets/images/users/profile.png"
                    alt="user"
                    class="rounded-circle"
                    width="31"
                  />
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-end user-dd animated"
                  aria-labelledby="navbarDropdown"
                >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i style="color: #3f51b5" class="mdi mdi-emoticon-devil m-r-5 m-l-5"></i> Admin</a
                  >
                  <a class="dropdown-item" href="javascript:void(0)"
                    ><i style="color: #3f51b5" class="mdi mdi-logout-variant m-r-5 m-l-5"></i> Logout</a
                  >
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
          <nav class="sidebar-nav" >
            <ul id="sidebarnav">
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="dashboard"
                  aria-expanded="false"
                  ><i class="mdi mdi-view-dashboard"></i
                  ><span class="hide-menu" >Dashboard</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="produk"
                  aria-expanded="false"
                  ><i class="mdi mdi-store" style="color: #3f51b5;"></i
                  ><span class="hide-menu" style="color: #3f51b5; font-weight: 550;">Product</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="pembelian"
                  aria-expanded="false"
                  ><i class="mdi mdi-border-all" style="color: #3f51b5;"></i
                  ><span class="hide-menu" style="color: #3f51b5; font-weight: 550;">Sale</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="user"
                  aria-expanded="false"
                  ><i class="mdi mdi-skull" style="color: #3f51b5;"  ></i
                  ><span class="hide-menu" style="color: #3f51b5; font-weight: 550;">User</span></a
                >
              </li>
              <li class="sidebar-item">
                <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="drug"
                  aria-expanded="false"
                  ><i class="mdi mdi-pill" style="color: #3f51b5;"></i
                  ><span class="hide-menu" style="color: #3f51b5; font-weight: 550;">Drug List</span></a
                >
              </li>
              <li class="sidebar-item">
                {{-- <a
                  class="sidebar-link waves-effect waves-dark sidebar-link"
                  href="error-404.html"
                  aria-expanded="false"
                  ><i class="mdi mdi-alert-outline" style="color: #3f51b5;"></i
                  ><span class="hide-menu" style="color: #3f51b5; font-weight: 550;">404</span></a
                > --}}
              </li>
              <li class="text-center p-40 upgrade-btn">
                <a
                  href="https://m.media-amazon.com/images/I/51WlnqNiCBL._AC_.jpg"
                  class="btn d-block w-100 btn-danger text-white"
                  target="_blank"
                  >21 +</a
                >
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
                    <a href="dashboard" class="link"
                      ><i class="mdi mdi-home-outline fs-4"></i
                    ></a>
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
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-body">
                  Welcome Back, fucking Admin!
                </div>
              </div>
            </div>
          </div>

          <div style="margin-top: 20px; margin-bottom: 20px;">
            <h1 class="mb-0 fw-bold"style="text-align: center">The Teenage Drug Lord</h1>
        </div>

          <div class="row">
            <!-- column -->
            <div class="col-lg-6">
              <div class="card">
                <div class="card-body">
                  <h4 class="card-title">Customer Review</h4>
                </div>
                <div class="comment-widgets scrollable">
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row m-t-0">
                    <div class="p-2">
                      <img
                        src="../assets/images/users/1.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">James Anderson</h6>
                      <span class="m-b-15 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">April 14, 2021</span>
                        <span class="label label-rounded label-primary"
                          >Pending</span
                        >
                        <span class="action-icons">
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-pencil-box-outline fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-check fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-heart-outline fs-4"></i
                          ></a>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="../assets/images/users/4.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text active w-100">
                      <h6 class="font-medium">Michael Jorden</h6>
                      <span class="m-b-15 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">April 14, 2021</span>
                        <span class="label label-success label-rounded"
                          >Approved</span
                        >
                        <span class="action-icons active">
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-pencil-box-outline fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-window-close fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i
                              class="mdi mdi-heart-outline fs-4 text-danger"
                            ></i
                          ></a>
                        </span>
                      </div>
                    </div>
                  </div>
                  <!-- Comment Row -->
                  <div class="d-flex flex-row comment-row">
                    <div class="p-2">
                      <img
                        src="../assets/images/users/5.jpg"
                        alt="user"
                        width="50"
                        class="rounded-circle"
                      />
                    </div>
                    <div class="comment-text w-100">
                      <h6 class="font-medium">Johnathan Doeting</h6>
                      <span class="m-b-15 d-block"
                        >Lorem Ipsum is simply dummy text of the printing and
                        type setting industry.
                      </span>
                      <div class="comment-footer">
                        <span class="text-muted float-end">April 14, 2021</span>
                        <span class="label label-rounded label-danger"
                          >Rejected</span
                        >
                        <span class="action-icons">
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-pencil-box-outline fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-check fs-4"></i
                          ></a>
                          <a href="javascript:void(0)"
                            ><i class="mdi mdi-heart-outline fs-4"></i
                          ></a>
                        </span>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

          <div class="col-lg-6">
            <div class="card">
              <div class="card-body">
                <h4 class="card-title">Weekly Stats</h4>
                <h6 class="card-subtitle">Average sales</h6>
                <div class="mt-5 pb-3 d-flex align-items-center">
                  <span
                    class="
                      btn btn-primary btn-circle
                      d-flex
                      align-items-center
                    "
                  >
                    <i class="mdi mdi-cart-outline fs-4"></i>
                  </span>
                  <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Top Sales</h5>
                    <span class="text-muted fs-6">Cawan Tomsketer</span>
                  </div>
                  <div class="ms-auto">
                    <span class="badge bg-light text-muted">+77%</span>
                  </div>
                </div>
                <div class="py-3 d-flex align-items-center">
                  <span
                    class="
                      btn btn-warning btn-circle
                      d-flex
                      align-items-center
                    "
                  >
                    <i class="mdi mdi-star-circle fs-4"></i>
                  </span>
                  <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Best Seller</h5>
                    <span class="text-muted fs-6">Marijuana</span>
                  </div>
                  <div class="ms-auto">
                    <span class="badge bg-light text-muted">+69%</span>
                  </div>
                </div>
                <div class="py-3 d-flex align-items-center">
                  <span
                    class="
                      btn btn-success btn-circle
                      d-flex
                      align-items-center
                    "
                  >
                    <i
                      class="mdi mdi-comment-multiple-outline text-white fs-4"
                    ></i>
                  </span>
                  <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Most Commented</h5>
                    <span class="text-muted fs-6">Ample Admin</span>
                  </div>
                  <div class="ms-auto">
                    <span class="badge bg-light text-muted">+91%</span>
                  </div>
                </div>
                <div class="py-3 d-flex align-items-center">
                  <span
                    class="btn btn-info btn-circle d-flex align-items-center"
                  >
                    <i class="mdi mdi-diamond fs-4 text-white"></i>
                  </span>
                  <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Top Budgets</h5>
                    <span class="text-muted fs-6">Sunil Joshi</span>
                  </div>
                  <div class="ms-auto">
                    <span class="badge bg-light text-muted">+15%</span>
                  </div>
                </div>

                <div class="pt-3 d-flex align-items-center">
                  <span
                    class="
                      btn btn-danger btn-circle
                      d-flex
                      align-items-center
                    "
                  >
                    <i class="mdi mdi-content-duplicate fs-4 text-white"></i>
                  </span>
                  <div class="ms-3">
                    <h5 class="mb-0 fw-bold">Best Designer</h5>
                    <span class="text-muted fs-6">Nirav Joshi</span>
                  </div>
                  <div class="ms-auto">
                    <span class="badge bg-light text-muted">+90%</span>
                  </div>
                </div>
              </div>
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
  </body>
</html>
