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
    <section class="ubah-pass">
        <div class="container">
                <div class="main-content">
                    <div class="logo">
                        <img src="/assets/logo-jti.png" alt="logo-jti" class="logo-jti">
                    </div>
                    <div class="title">
                        <h1 class="mt-5 mb-4">Change Password</h1>
                    </div>               
                    <form action="{{url('password/'.$data->pluck('id')->implode(','))}}" method="POST" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {!! method_field('PUT') !!}
                            <div class="form mb-3">
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" placeholder="New Password">
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
                            <div class="button-save">
                                <button type="submit" class="btn">Save</button>
                            </div>
                        </form>   
                        <div class="cancel mt-2">
                            <a href="{{route('lupaPassword')}}">Cancel</a>
                        </div>
                </div>
        </div>
    </section>   
</body>
</html>