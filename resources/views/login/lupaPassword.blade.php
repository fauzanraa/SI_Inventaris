<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/stylePass.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>SI Inventaris</title>
</head>
<body>
    <section class="lupa-pass">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="gradient-login">
                        <img src="/assets/bg-login.png" alt="bg-login" class="bg-login">
                    </div>
                    <div class="logo">
                        <img src="/assets/logo-jti.png" alt="logo-jti" class="logo-jti">
                    </div>
                    <div class="vector">
                        <img src="/assets/vector-login.png" alt="vector" class="vector-login">
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-content">
                        <form action="{{route('requestUbahPassword/'.$user->username)}}" method="POST" >
                            {{ csrf_field() }}
                            <h1 class="mb-5">Lupa Password</h1>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username">
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <input type="text" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" placeholder="Recovery Code">
                                @error('recovery_code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn mt-3">Lanjut</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>   
</body>
</html>