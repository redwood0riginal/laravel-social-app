<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="auth.css">
    <title>login</title>
</head>

<body>
    <div class="login-container">
        <div class="logo-img">
            <img src="logo-slogan.png" alt="">
        </div>
        <form class="form" action="/login" method="post">
            @if (session()->has('error'))
                <div>
                    <div>
                        {{session('error')}}
                    </div>
                </div>
            @endif
            @csrf
            <p class="login">Log in to Holazomi</p>
            <div class="inputContainer">
                <input placeholder="Enter your email" name="userEmail" type="email" class="fInput ">
                <input placeholder="Enter your password" name="userPassword" type="password" class="fInput ">
            </div>
            <button class="button" type="submit">Log in</button>
            <button class="button">forget password?</button>
            <div class="con">
                <p>don't have account?&nbsp;</p>
                <a href="register-form"> sign in</a>
            </div>
        </form>
    </div>
</body>

</html>
