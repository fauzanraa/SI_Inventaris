<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/styleReg.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>SI Inventaris</title>
</head>
<body>
    <section class="register">
        <div class="container">
                <div class="main-content">
                    <div class="logo">
                        <img src="assets/logo-jti.png" alt="logo-jti" class="logo-jti">
                    </div>
                    <div class="title">
                        <h1 class="mt-3 mb-4">Register</h1>
                    </div>               
                    <form action="{{route('simpanRegistrasi')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            <div class="form mb-3">
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="Nama"> 
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form mb-3">
                                <input type="text" class="form-control @error('nim') is-invalid @enderror" name="nim" placeholder="NIM"> 
                                @error('nim')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form mb-3">
                                <input type="text" class="form-control @error('username') is-invalid @enderror" name="username" placeholder="Username"> 
                                @error('username')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password" > 
                                @error('password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form mb-3">
                                <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" placeholder="Confirm Password"> 
                                @error('confirm_password')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="form mb-3">
                                <input type="text" class="form-control @error('recovery_code') is-invalid @enderror" name="recovery_code" placeholder="Recovery Code"> 
                                @error('recovery_code')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                            </div>
                            <div class="button-register">
                                <button type="submit" class="btn">Register</button>
                            </div>
                        </form>  
                        <div class="back mt-3">
                            <a href="{{route('login')}}">Back</a>
                        </div>
                </div>
        </div>  
    </section>   
</body>
</html>