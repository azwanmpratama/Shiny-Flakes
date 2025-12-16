<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>User - ShinyFlakes</title>
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
                            <img src="{{ asset('assets/images/logo-icon.png') }}" alt="homepage" class="dark-logo" style="width: 40px; height: auto;" />
                        </b>
                        <span class="logo-text" style="margin-top: 10px;">
                            <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="dark-logo" style="width: 135px; height: auto;" />
                        </span>
                    </a>
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                </div>
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <ul class="navbar-nav float-start me-auto"></ul>
                    <ul class="navbar-nav float-end">
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <img src="{{ asset('assets/images/users/profile.png') }}" alt="user" class="rounded-circle" width="31" />
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
                                <li class="breadcrumb-item active" aria-current="page">User Management</li>
                            </ol>
                        </nav>
                        <h1 class="mb-0 fw-bold">User List</h1>
                    </div>
                </div>
            </div>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                
                                @if(session('success'))
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        {{ session('success') }}
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                @if($errors->any())
                                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                @endif

                                <div class="col-12 text-end upgrade-btn mb-4">
                                    <button type="button" class="btn btn-primary text-white" data-bs-toggle="modal" data-bs-target="#addUserModal" style="border-radius: 50px; padding: 10px 20px;">
                                        <i class="mdi mdi-account-plus me-1"></i> Add User
                                    </button>
                                </div>

                                <div class="table-responsive">
                                    <table class="table table-hover">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Username</th>
                                                <th scope="col">Email</th>
                                                <th scope="col">Role</th>
                                                <th scope="col" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                        <tr>
                                            <th scope="row">{{ $loop->iteration }}</th>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if($user->role == 'admin')
                                                    <span class="badge bg-danger rounded-pill">Admin</span>
                                                @elseif($user->role == 'kasir')
                                                    <span class="badge bg-warning text-dark rounded-pill">Cashier</span>
                                                @else
                                                    <span class="badge bg-info rounded-pill">Customer</span>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                
                                                {{-- LOGIKA TOMBOL DELETE --}}
                                                
                                                {{-- 1. Cek apakah yang sedang login adalah ADMIN --}}
                                                @if(Auth::user()->role == 'admin')
                                                    
                                                    {{-- 2. Pastikan Admin tidak bisa menghapus dirinya sendiri --}}
                                                    @if(Auth::id() != $user->id)
                                                        <form action="{{ route('user.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this user?');" style="display:inline;">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-pill px-3">Delete</button>
                                                        </form>
                                                    @else
                                                        <span class="text-muted small">Current User</span>
                                                    @endif

                                                @else
                                                    {{-- Jika BUKAN Admin (Misal Cashier), Tombol Delete Hilang/Disabled --}}
                                                    <button class="btn btn-outline-secondary btn-sm rounded-pill px-3" disabled>Restricted</button>
                                                @endif

                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <footer class="footer text-center">
                All Rights Reserved by Shiny Flakes. Designed and Developed by <a href="#">Azwan Maurizky</a>.
            </footer>
        </div>
    </div>

    <div class="modal fade" id="addUserModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="addUserModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content" style="border-radius: 15px;">
                <div class="modal-header border-bottom-0">
                    <h5 class="modal-title fw-bold" id="addUserModalLabel">Create New Account</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                
                <form action="{{ route('user.store') }}" method="POST">
                    @csrf <div class="modal-body">
                        <div class="row g-3">
                            <div class="col-md-12">
                                <label for="username" class="form-label fw-bold">Username <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="username" name="username" required placeholder="Enter username" style="border-radius: 10px;">
                            </div>

                            <div class="col-md-12">
                                <label for="email" class="form-label fw-bold">Email Address <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" required placeholder="user@example.com" style="border-radius: 10px;">
                            </div>

                            <div class="col-md-6">
                                <label for="password" class="form-label fw-bold">Password <span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password" required placeholder="Min 6 chars" style="border-radius: 10px;">
                            </div>

                            <div class="col-md-6">
                                <label for="role" class="form-label fw-bold">Role <span class="text-danger">*</span></label>
                                <select class="form-select" id="role" name="role" required style="border-radius: 10px;">
                                    <option value="" selected disabled>Select Role</option>
                                
                                    @if(Auth::user()->role == 'admin')
                                        <option value="admin">Admin</option>
                                    @endif

                                    <option value="kasir">Cashier</option>
                                    <option value="customer">Customer</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer border-top-0">
                        <button type="button" class="btn btn-light rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Create User</button>
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
</body>
</html>