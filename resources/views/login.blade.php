<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="css/login.css" />
    <title>Sign in & Sign up Form</title>
</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">
                <form action="/login" method="post" class="sign-in-form">
                    @csrf

                    @if(session()->has('success'))
                    <div class="alert"
                        style="background-color:#d6efed ; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                        <p>{{ session('success') }}</p>
                    </div>
                    @endif

                    @if(session()->has('loginError'))
                    <div class="alert"
                        style="background-color: #FAD4D4; padding: 12px; border-radius: 10px; margin-bottom: 20px;">
                        <p>{{ session('loginError') }}</p>
                    </div>
                    @endif

                    <h2 class="title">Sign in</h2>

                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="email" name="email" id="emaillogin" placeholder="Email" required
                            value="{{ old('email') }}" autofocus />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="passwordlogin" placeholder="Password" required
                            value="{{ old('password') }}" />
                    </div>
                    <input type="submit" value="Login" class="btn solid" />
                    
                </form>
                <form action="/register" method="post" class="sign-up-form">
                    @csrf
                    <h2 class="title">Sign up</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input type="text" name="user_name" id="nameregis" placeholder="Name" required
                            value="{{ old('user_name') }}" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-at"></i>
                        <input type="text" name="username" id="usernameregis" placeholder="Username" required
                            value="{{ old('username') }}" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" id="email" placeholder="Email" required
                            value="{{ old('email') }}" />
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" id="passwordregis" placeholder="Password" required
                            value="{{ old('password') }}" />
                    </div>
                    <input type="submit" class="btn" value="Sign up" />
                    
                </form>
            </div>
        </div>

        <div class="panels-container">
            <div class="panel left-panel">
                <div class="content">
                    <h3>New here ?</h3>
                    <p>Please register your account first before purchasing preloved books.</p>
                    <button class="btn transparent" id="sign-up-btn">Sign up</button>
                </div>
                <img src="img/womenbk2.png" class="image" alt="" />
            </div>
            <div class="panel right-panel">
                <div class="content">
                    <h3>One of us ?</h3>
                    <p>Log in with your account to continue doing transaction of preloved books here.</p>
                    <button class="btn transparent" id="sign-in-btn">Sign in</button>
                </div>
                <img src="img/womenbk1.png" class="image" alt="" />
            </div>
        </div>
    </div>

    <script src="js/login.js"></script>
</body>

</html>