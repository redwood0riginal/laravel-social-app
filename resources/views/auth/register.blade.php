<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="auth.css">
    <title>register</title>
</head>

<body>
    <div class="login-container">
        <div class="logo-img">
            <img src="logo-slogan.png" alt="">
        </div>
        <form class="form" action="register" method="post">
            @csrf
            <div>
                @error('full_name')
                    {{$message}}
                @enderror
            </div>
            <div>
                @error('email')
                    {{$message}}
                @enderror
            </div>
            <div>
                @error('password')
                    {{$message}}
                @enderror
            </div>
            <p class="login">JOIN NOW!!</p>
            <div class="inputContainer">
                <input placeholder="Name" name="full_name" type="text" class="fInput ">
                <input placeholder="Email" name="email" type="email" class="fInput ">
                <input placeholder="Password" name="password" type="password" class="fInput ">
                <input placeholder="Confirm password" name="password_confirmation" type="password" class="fInput ">
            </div>
            <button class="button" type="submit">Sign in</button>
            <div class="con">
                <p>Already have an account?&nbsp;</p>
                <a href="login-form"> log in</a>
            </div>
        </form>
    </div>
</body>

</html
