@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/styleIndexAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>SI Inventaris</title>
</head>
<body class="bg-body-tertiary">
    <section class="admin">
        <div class="sidebar">
            <nav>
                <ul>
                    <li class="nav-item">
                            <a href="{{ route('indexAdmin')}}" class="nav-link {{ \Request::is('admin*') ? 'active' : ''}}">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-house"></i>
                                    <span>Dashboard</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('listRuanganAdmin')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-calendar"></i>
                                    <span>Ruangan</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('cekPengajuanAdmin')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-pen-to-square"></i>
                                    <span>Konfirmasi Pengajuan</span>
                                </p>
                            </a>    
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('laporanAdmin')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-reguler fa-file"></i>
                                    <span>Laporan</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('logout')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                                    <span>Logout</span>
                                </p>
                            </a>
                    </li>
                </ul>
            </nav>
            <div class="menu-toggle">
                <i class="fa fa-bars"></i>
            </div>
        </div>

        <div class="content">
            <div class="topbar">
                <div class="title-content">
                    <p>Selamat Datang, Admin</p>
                </div>
                <div class="logo-jti">
                    <img src="/assets/logo-jti.png">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <div class="notif-pengajuan">
                    <p class="count-notif">{{$notif->pluck('notif')->implode(',')}}</p>
                    <p class="notif-detail">Mahasiswa yang melakukan peminjaman</p>
                </div>
                <div class="link-content mb-3">
                    <a href="{{route('cekPengajuanAdmin')}}">Cek Detail</a>
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