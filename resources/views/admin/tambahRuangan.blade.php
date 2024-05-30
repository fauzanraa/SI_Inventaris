@extends('layouts.app')

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
            {{-- <nav>
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
                            <i class="nav-icon fas fa-solid fa-calendar"></i>
                            Ruangan
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
            </nav> --}}
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
                <form action="{{route('simpanRuanganAdmin')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h3 class="mb-5">Tambah Ruangan</h3>
                    <div class="mb-3">
                        <span>Kode Ruangan</span>
                        <input type="text" class="form-control" name="kode" placeholder="">
                    </div>
                    <div class="mb-3">
                        <span>Nama Ruangan</span>
                        <input type="text" class="form-control" name="nama" placeholder="">
                    </div>
                    <div class="mb-3">
                        <span>Lantai</span>
                        <input type="text" class="form-control" name="lantai" placeholder="">
                    </div>
                    <div class="mb-3">
                        <span>Foto Ruangan</span>
                        <input type="file" class="form-control" name="foto">
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
                    <a href="{{route('listRuanganAdmin')}}">Kembali</a>
                    <br><br>
            </div>
        </div>
    </section>

</body>
</html>