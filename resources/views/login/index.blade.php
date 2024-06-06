<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/styleLog.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js" integrity="sha512-AA1Bzp5Q0K1KanKKmvN/4d3IRKVlv9PYgwFPvm32nPO6QS8yH1HO7LbgB1pgiOxPtfeg5zEn2ba64MUcqJx6CA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
                        <h1 class="mt-4">Selamat Datang !</h1>
                    </div>
                    <div class="sub-title">
                        <p>Silahkan Masuk</p>
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
                            <button type="submit" class="btn">Masuk</button>
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
                            <a href="{{route('lupaPassword')}}">Lupa Password ?</a>
                        </div>
                        <div class="register">
                            <p>Tidak punya akun? <a href="{{route('registrasi')}}">Registrasi</a></p>
                        </div>
                </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('error'))
        <script>
            toastr.warning("{{ Session::get('error')}}", {timeOut:12000});
        </script>
    @endif

    @if (Session::has('message'))
        <script>
            swal("{{Session::get('message')}}"{
                icon: "success",
                button: false,
                timer: 2000
            })
        </script>
    @endif
    
</body>
</html>