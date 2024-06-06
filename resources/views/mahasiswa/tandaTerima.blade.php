@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/styleTandaTerimaMhs.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="/DataTables/datatables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SI Inventaris</title>
</head>
<body>
    <section class="mahasiswa">
        <div class="top-bar">
            <div class="logo">
                <img src="/assets/logo-jti.png" alt="logo-jti" class="logo-jti">
            </div>
            <div class="link">
                <nav>
                    <ul>
                        <li class="navbar">
                        <a href="{{route('indexMahasiswa')}}">Beranda</a>
                        </li>
                        <li class="navbar">
                            <a href="{{route('cekRuanganMhs')}}">Cek Ruangan</a>
                        </li>
                        <li class="navbar">
                            <a href="{{route('pengajuanMhs')}}">Pengajuan</a>
                        </li>
                        <li class="navbar">
                            <a href="{{route('tandaTerimaMhs')}}">Tanda Terima</a>
                        </li>
                        <li class="navbar">
                            <a href="{{route('logout')}}" class="logout">LogOut</a>
                        </li>
                    </ul>
                </nav>
                <div class="menu-toggle">
                    <i class="fa fa-bars"></i>
                </div>
            </div>
        </div>

        <div class="content">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID Peminjaman</th>
                    <th scope="col">Tanggal Approval</th>
                    <th scope="col">Tanggal Mulai</th>
                    <th scope="col">Tanggal Selesai</th>
                    <th scope="col">Status Admin</th>
                    <th scope="col">Status URT</th>
                    <th scope="col">Catatan</th>
                    <th scope="col">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tandaTerima as $item)
                        <tr>
                        <th scope="row">{{$item->pengajuan_pinjaman_id}}</th>
                        <th scope="row">{{$item->tanggal_approval}}</th>
                        <th scope="row">{{$item->tanggal_mulai}}</th>
                        <th scope="row">{{$item->tanggal_selesai}}</th>
                        <td>{{$item->status_admin}}</td>
                        <td>{{$item->status_urt}}</td>
                        <td>{{$item->catatan}}</td>
                        <td><a href="'.url('/mahasiswa/'.$tandaTerima->id. '/buktiPeminjaman').'" class="btn btn-primary btn-sm"><i class="fa-regular fa-clipboard"></i></a></td>
                        </tr>
                        <tr>
                    @endforeach
                </tbody>
            </table>
            {{$tandaTerima->onEachSide(5)->links()}}
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $(".menu-toggle").click(function () {
                $('nav').toggleClass('active');
            })
        })
    </script>
    
    @push('scripts')
        {{$dataTable->scripts(attributes: ['type' => 'module'])}}
    @endpush
</body>
</html>