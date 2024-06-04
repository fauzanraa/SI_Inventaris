<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/styleLog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>SI Inventaris</title>
</head>
<body>
    <section class="login">
        <div class="container">
                <div class="main-content">
                    <div class="logo">
                        <img src="assets/logo-jti.png" alt="logo-jti" class="logo-jti">
                    </div>
                    <div class="title">
                        <h1 class="mt-4">Welcome!</h1>
                    </div>
                    <div class="sub-title">
                        <p>Please Login</p>
                    </div>               
                    <form action="{{route('postLogin')}}" method="post">
                        {{ csrf_field() }}             
                        <div class="form mb-3">
                            <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                            @error('username')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="form mb-3">
                            <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password">
                            @error('password')
                                <div class="invalid-feedback">
                                    {{$message}}
                                </div>
                            @enderror
                        </div>
                        <div class="button-login">
                            <button type="submit" class="btn">Login</button>
                            @if (Session::has('message'))
                                <script>
                                    swal("Message","{{ Session::get('message') }}",'success',{
                                        button:true,
                                        button:"OK",
                                    });
                                </script>
                            @endif
                        </div>
                    </form>    
                        <div class="change-password mt-1">
                            <a href="{{route('lupaPassword')}}">Forgot Password ?</a>
                        </div>
                        <div class="register">
                            <p>Don't have account? <a href="{{route('registrasi')}}">Register</a></p>
                        </div>
                </div>
        </div>
    </section>
</body>
</html>