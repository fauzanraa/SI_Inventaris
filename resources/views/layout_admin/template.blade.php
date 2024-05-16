<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/styleAdmin.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <title>SI Inventaris</title>
</head>
<body>
    <section class="admin">
        <div class="sidebar">
            <nav>
                <ul>
                <li class="nav-item">
                    <a href="{{ url('/admin')}}" class="nav-link {{ \Route::is('/admin') ? 'active' : ''}}">
                        <p>
                            <i class="nav-icon fas fa-solid fa-house"></i>
                            Dashboard
                        </p>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                            <i class="nav-icon fas fa-solid fa-user"></i>
                            Data User
                        </p>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                            <i class="nav-icon fas fa-solid fa-pen-to-square"></i>
                            Konfirmasi Pengajuan
                        </p>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                            <i class="nav-icon fas fa-reguler fa-file"></i>
                            Laporan
                        </p>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                            <i class="nav-icon fas fa-solid fa-right-from-bracket"></i>
                            Logout
                        </p>
                </li>
                </ul>
            </nav>
        </div>

        <div class="content">
            <div class="topbar">
                <div class="title-content">
                    <p>Welcome Back Admin</p>
                </div>
                <div class="logo-jti">
                    <img src="/assets/logo-jti.png" alt="">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <table>
                    <tr bgcolor="white">
                        <th colspan="2">1</th>
                        <th>Mahasiswa yang melakukan peminjaman</th>
                    </tr>
                </table>
                <div class="link-content">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                           Cek Detail
                        </p>
                </div>
            </div>

            <div class="card-container">
                <table>
                    <tr bgcolor="white">
                        <th colspan="2">1</th>
                        <th>Mahasiswa yang melakukan peminjaman</th>
                    </tr>
                </table>
                <div class="link-content">
                    <a href="{{ url('/level')}}" class="nav-link ">
                        <p>
                           Cek Detail
                        </p>
                </div>
            </div>
        </div>
    </section>
</body>
</html>