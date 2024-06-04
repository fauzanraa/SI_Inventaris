@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/urt/styleKonfirmUrt.css">
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
                            <a href="{{ route('indexAdmin')}}" class="nav-link {{ \Route::is('/admin') ? 'active' : ''}}">
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
                    <p>Welcome Back, Admin</p>
                </div>
                <div class="logo-jti">
                    <img src="/assets/logo-jti.png">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <div class="main-content">
                    <h2>Details</h2>
                    <br>
                    <table class="table table-bordered table-striped table-hover table-sm">
                        <tr>
                            <th>Nama</th>
                            <td>{{ $data->user_id }}</td>
                        </tr>
                        <tr>
                            <th>Ruangan</th>
                            <td>{{ $data->ruangan_id }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Mulai</th>
                            <td>{{ $data->tanggal_mulai }}</td>
                        </tr>
                        <tr>
                            <th>Tanggal Selesai</th>
                            <td>{{ $data->tanggal_selesai }}</td>
                        </tr>
                        <tr>
                            <th>Pukul</th>
                            <td></td>
                        </tr>
                        <tr>
                            <th>Dokumen</th>
                            <td><a href="{{ asset('/urt/dokumen/' .$data->dokumen_pendukung) }}">{{ $data->dokumen_pendukung }}</a></td>
                        </tr>
                    </table>
                    <a href="{{ route('cekPengajuanUrt') }}" class="btn btn-sm btn-default mt-2">Back</a>
                </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>