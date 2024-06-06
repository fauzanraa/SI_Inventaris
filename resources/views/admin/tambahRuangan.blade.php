@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/admin/styleRuangAdm.css">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <title>SI Inventaris</title>
</head>
<body>
    <section class="admin">
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
                        <input type="text" class="form-control @error('kode') is-invalid @enderror" name="kode" placeholder="">
                        @error('kode')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror    
                    </div>
                    <div class="mb-3">
                        <span>Nama Ruangan</span>
                        <input type="text" class="form-control @error('nama') is-invalid @enderror" name="nama" placeholder="">
                        @error('nama')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <span>Lantai</span>
                        <input type="text" class="form-control @error('lantai') is-invalid @enderror" name="lantai" placeholder="">
                        @error('lantai')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <span>Foto Ruangan</span>
                        <input type="file" class="form-control @error('foto') is-invalid @enderror" name="foto">
                        @error('foto')
                            <div class="invalid-feedback">
                                {{$message}}
                            </div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary mt-3">Save</button>
                </form>
                
                <div class="back">
                    <button class="btn"><a href="{{route('listRuanganAdmin')}}" class="mt-5">Kembali</a></button>
                    <br>
                </div>
            </div>
        </div>
    </section>

</body>
</html>