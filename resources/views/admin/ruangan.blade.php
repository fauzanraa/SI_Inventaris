@extends('layouts.app')
@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/styleRuangAdm.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SI Inventaris</title>
</head>
<body class="bg-body-tertiary">
    <section class="admin">
        <div class="sidebar">
            <nav>
                <ul>
                    <li class="nav-item">
                            <a href="{{ route('indexAdmin')}}" class="nav-link">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-house"></i>
                                    <span>Dashboard</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('listRuanganAdmin')}}" class="nav-link {{ \Request::is('admin*') ? 'active' : ''}}">
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
                    <img src="/assets/logo-jti.png" alt="">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <div class="card-tools"> 
                    <a class="btn  mt-1" href="{{ route('tambahRuanganAdmin') }}">Tambah</a> 
                    <br><br>
                </div>
                <div class="table-content">
                    {{ $dataTable->table()}} 
                </div>
            </div>
        </div>
    </section>

    @if (Session::has('message'))
        <script>
            Swal.fire({
                title: "{{Session::get('message')}}",
                icon: "success",
                showConfirmButton: false,
                timer: 2000
            });
        </script>
    @endif

    @push('scripts')
        {{$dataTable->scripts(attributes: ['type' => 'module'])}}
    @endpush
</body>
</html>