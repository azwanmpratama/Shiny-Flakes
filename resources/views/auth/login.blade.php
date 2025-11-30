<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Shiny Flakes</title>
    <link href="../assets/dist/css/stylelog.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <style>
        /* --- 1. FIXED BUTTON BACK (Agar tidak menggeser layout) --- */
        .btn-back-home {
            position: fixed; /* Gunakan fixed agar nempel di layar, bukan di container */
            top: 40px;
            left: 40px;
            z-index: 1000;
            text-decoration: none;
            color: #fff;
            font-family: 'Poppins', sans-serif;
            font-weight: 600;
            font-size: 0.9rem;
            display: flex;
            align-items: center;
            gap: 10px;
            padding: 12px 25px;
            border-radius: 50px;
            background: rgba(255, 255, 255, 0.15);
            backdrop-filter: blur(8px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            transition: all 0.3s ease;
            box-shadow: 0 5px 15px rgba(0,0,0,0.1);
        }

        .btn-back-home:hover {
            background: #fff;
            color: #3F51B5; /* Warna Shiny Flakes */
            transform: translateX(-5px) scale(1.05);
            box-shadow: 0 8px 25px rgba(0,0,0,0.2);
        }

        .btn-back-home i { transition: transform 0.3s; }
        .btn-back-home:hover i { transform: translateX(-3px); }

        /* --- 2. INPUT FIELD GLOW (Efek Shiny) --- */
        .input-field {
            border: 2px solid transparent;
            transition: 0.3s;
        }
        .input-field:focus-within {
            border-color: #3F51B5;
            box-shadow: 0 0 10px rgba(63, 81, 181, 0.2);
            background-color: #fff;
        }
        .input-field i { color: #acacac; transition: 0.3s; }
        .input-field:focus-within i { color: #3F51B5; }

        /* --- 3. LOGIN BUTTON GRADIENT --- */
        .btn.solid {
            background-color: #3F51B5; /* Warna Dasar */
            transition: 0.3s;
            border: 2px solid #3F51B5;
        }
        .btn.solid:hover {
            background-color: #303f9f;
            box-shadow: 0 5px 15px rgba(63, 81, 181, 0.4);
            transform: translateY(-2px);
        }

        /* --- RESPONSIVE MOBILE --- */
        @media (max-width: 870px) {
            .btn-back-home {
                top: 20px; left: 20px;
                background: rgba(63, 81, 181, 0.1);
                color: #3F51B5;
                border: 1px solid #3F51B5;
            }
            .btn-back-home:hover {
                background: #3F51B5;
                color: #fff;
            }
        }
    </style>
</head>
<body>

<a href="{{ route('shop.index') }}" class="btn-back-home">
    <i class="fas fa-arrow-left"></i> Back to Shop
</a>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            
            <form action="{{ route('actionlogin') }}" method="POST" class="sign-in-form">
                @csrf
                <h2 class="title" style="color: #3F51B5;">Sign In</h2>
                
                <div class="input-field">
                    <i class="fas fa-envelope"></i>
                    <input type="email" placeholder="Email Address" name="email" id="email" required />
                </div>
                
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password" required />
                </div>
                
                <input type="submit" value="Sign In" class="btn solid" />

            </form>

        </div>
    </div>

    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Welcome Back, Dude!</h3>
                <p>Enter your personal details and start your journey with us.</p>
            </div>
            <img src="../assets/images/favicon.png" class="image" alt="Logo" style="width: 210px; margin-right: 120px; filter: drop-shadow(0 10px 15px rgba(0,0,0,0.2));">
        </div>
        
        <div class="panel right-panel">
            <div class="content">
                <h3>Hello, Friend!</h3>
                <p>To keep connected with us please login with your personal info</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="../assets/images/favicon.png" class="image" alt="" style="width: 210px; margin-left: 100px;">
        </div>
    </div>
</div>

<script>
    // Logic Animasi Sign In / Sign Up (Jika diperlukan)
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    if(sign_up_btn) {
        sign_up_btn.addEventListener('click', () =>{ container.classList.add("sign-up-mode"); });
    }
    if(sign_in_btn) {
        sign_in_btn.addEventListener('click', () =>{ container.classList.remove("sign-up-mode"); });
    }

    // --- LOGIC ALERT GAGAL LOGIN (SWEETALERT2) ---
    // Laravel Session Check
    @if(Session::has('error'))
        Swal.fire({
            icon: 'error',
            title: 'Access Denied!',
            text: '{{ Session::get("error") }}',
            background: '#fff',
            confirmButtonColor: '#3F51B5',
            confirmButtonText: 'Try Again',
            backdrop: `
                rgba(0,0,123,0.4)
                url("../assets/images/cat-nyan.gif") /* Opsional: Tambah gif lucu kalau mau */
                left top
                no-repeat
            `
        });
    @endif

    // --- LOGIC ALERT SUKSES LOGOUT (Opsional) ---
    @if(Session::has('success'))
        Swal.fire({
            icon: 'success',
            title: 'See You!',
            text: '{{ Session::get("success") }}',
            confirmButtonColor: '#3F51B5',
            timer: 2000,
            showConfirmButton: false
        });
    @endif

</script>
</body>
</html>