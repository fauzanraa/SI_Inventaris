@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/styleCekRuangan.css">
    <!-- Data Tables -->
    <link rel="stylesheet" href="/DataTables/datatables.css" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <title>SI Inventaris</title>
</head>
<body>
    <section class="cekRuangan">
        <div class="top-bar">
            <div class="logo">
                <img src="/assets/logo-jti.png" alt="logo-jti" class="logo-jti">
            </div>
            <div class="link">
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
                </ul>
            </div>
            <div class="avatar">
                <img src="/assets/avatar-user.png" alt="avatar" class="avatar-user">
            </div>
        </div>

        <div class="content">
            @foreach ($ruangan as $item)
            <ul class="ruangan">
                <li >
                    <input type="checkbox" name="ruangan" id={{$item->id}}>
                    <label for={{$item->id}}>{{$item->nama}}</label>
                    <div class="content-ruangan">
                        <p>{{$item->kode}} | {{'Lantai ' .$item->lantai}}
                            <br><br>
                        <img src="{{ asset('ruangan/' .$item->foto) }}" height="15%" width="50%">
                        </p>
                    </div>
                </li>
            </ul>
                
            @endforeach
        </div>
    </section>

    <script src="/DataTables/datatables.js"></script>
</body>
</html>