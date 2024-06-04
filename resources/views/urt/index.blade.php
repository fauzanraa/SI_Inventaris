<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/urt/styleIndexUrt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SI Inventaris</title>
</head>
<body class="bg-body-tertiary">
    <section class="urt">
        <div class="sidebar">
            <nav>
                <ul>
                    <li class="nav-item">
                            <a href="{{ route('indexUrt')}}" class="nav-link {{ \Route::is('/admin') ? 'active' : ''}}">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-house"></i>
                                    <span>Dashboard</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('cekPengajuanUrt')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-pen-to-square"></i>
                                    <span>Konfirmasi Pengajuan</span>
                                </p>
                            </a>    
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('laporanUrt')}}" class="nav-link ">
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
                    <p>Welcome Back, Urusan Rumah Tangga</p>
                </div>
                <div class="logo-jti">
                    <img src="/assets/logo-jti.png">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <div class="notif-pengajuan">
                    <p class="count-notif">1</p>
                    <p class="notif-detail">Mahasiswa yang melakukan peminjaman</p>
                </div>
                <div class="link-content mb-3">
                    <a href="{{route('cekPengajuanAdmin')}}">Cek Detail</a>
                </div>
            </div>
        </div>
    </section>
</body>
</html>