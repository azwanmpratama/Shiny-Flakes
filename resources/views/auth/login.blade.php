<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - Shiny Flakes</title>
    <link href="../assets/dist/css/stylelog.css" rel="stylesheet" />
    <link rel="icon" type="image/png" sizes="16x16" href="../assets/images/favicon.png" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
</head>
<body>

<div class="container">
    <div class="forms-container">
        <div class="signin-signup">
            <form action="{{ route('login') }}" method="GET">
                @csrf
                <h2 class="title">Log In Form</h2>
                <div class="input-field">
                    <i class="fas fa-user"></i>
                    <input type="text" placeholder="Username" name="username" id="username" required/>
                </div>
                <div class="input-field">
                    <i class="fas fa-lock"></i>
                    <input type="password" placeholder="Password" name="password" id="password" required/>
                </div>
                <input type="submit" value="Login" class="btn solid" />
                <p class="error-message" id="error-message"></p>
            </form>
        </div>
    </div>
    <div class="panels-container">
        <div class="panel left-panel">
            <div class="content">
                <h3>Welcome Back, Bitch!</h3>
                <p>Enter Your personal details and start journey with us</p>
            </div>
            <img src="../assets/images/favicon.png" class="image" alt="" style="width: 210px; margin-right: 120px;">
        </div>
        <div class="panel right-panel">
            <div class="content">
                <h3>Hello, Bitch!</h3>
                <p>To keep connected with us please login with your personal info</p>
                <button class="btn transparent" id="sign-in-btn">Sign In</button>
            </div>
            <img src="../assets/images/favicon.png" class="image" alt="" style="width: 210px; margin-left: 100px;">
        </div>
    </div>
</div>

<script>
    const sign_in_btn = document.querySelector("#sign-in-btn");
    const sign_up_btn = document.querySelector("#sign-up-btn");
    const container = document.querySelector(".container");

    sign_up_btn.addEventListener('click', () =>{
        container.classList.add("sign-up-mode");
    });

    sign_in_btn.addEventListener('click', () =>{
        container.classList.remove("sign-up-mode");
    });


</script>
</body>
</html>
