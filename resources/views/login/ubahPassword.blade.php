<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/login/stylePass.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SI Inventaris</title>
</head>
<body>
    <section class="ubah-pass">
        <div class="container">
            <div class="main-content">
                <div class="logo">
                    <img src="/assets/logo-jti.png" alt="logo-jti" class="logo-jti">
                </div>
                <div class="title">
                    <h1 class="mt-5 mb-4">Ubah Password</h1>
                </div>               
                <form action="{{url('password/'.$data->pluck('id')->implode(','))}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form mb-3">
                        <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="Password Baru" required>
                        @error('password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div class="form mb-3">
                        <input type="password" class="form-control @error('confirm_password') is-invalid @enderror" name="confirm_password" placeholder="Konfirmasi Password" required pattern="{6,}" title="Minimal 6 karakter, cocokkan dengan password di atas" oninput="checkPasswordMatch()">
                        @error('confirm_password')
                        <div class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror
                    </div>
                    <div id="passwordMismatch" style="display: none; color: red;">Password tidak cocok</div>
                    <script>
                        function checkPasswordMatch(){
                            var password = document.getElementsByName('password')[0];
                            var confirmPassword = document.getElementsByName('confirm_password')[0];
                            var passwordMismatch = document.getElementById('passwordMismatch');

                            if (password.value != confirmPassword.value){
                                confirmPassword.setCustomValidity("Password tidak cocok");
                                passwordMismatch.style.display = 'block';
                            } else {
                                confirmPassword.setCustomValidity('');
                                passwordMismatch.style.display = 'none';
                            }
                        }
                    </script>
                    <div class="button-save">
                        <button type="submit" class="btn">Simpan</button>
                    </div>
                </form>   
                <div class="cancel mt-2">
                    <a href="{{route('login')}}">Batal</a>
                </div>
            </div>
        </div>
    </section>
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message')}}", {timeOut:1200});
        </script>
    @endif
</body>
</html>