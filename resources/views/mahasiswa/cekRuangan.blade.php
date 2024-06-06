@extends('layouts.app')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/styleCekRuangan.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
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
            <div class="filter">
                <form action="{{route('cekRuanganMhs')}}" method="GET" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="title-filter">
                        <span>Filter Berdasarkan :</span>
                    </div>
                    <div class="filterBy">
                        <span>Nama :</span>
                        <span class="date">Tanggal :</span>
                    </div>
                    <div class="filterDate">
                        <span class="start-date">Tanggal Mulai</span>
                        <span class="end-date">Tanggal Selesai</span>
                    </div>
                    <div class="form-nama mb-3">
                        <input type="text" class="form-control" id="filter_nama" name="filter_nama" placeholder="Cari Ruangan">
                    </div>
                    <div class="form-tanggal-mulai mb-3">
                        <input type="date" class="form-mulai form-control" id="filter_tanggal_mulai" name="filter_tanggal_mulai" placeholder="Tanggal Mulai" onfocus="this.type='date'">
                    </div>
                    <div class="form-tanggal-selesai mb-3">
                        <input type="date" class="form-control" id="filter_tanggal_selesai" name="filter_tanggal_selesai" placeholder="Tanggal Selesai" onfocus="this.type='date'">
                    </div>
                    <button type="submit" class="btn btn-primary" hidden>Submit</button>
                </form>
            </div>
            
            <div id="list_ruangan" class="list_ruangan">
                @foreach ($ruangan as $item)
                <ul class="ruangan" id="ruangan">
                    <li>
                        <input type="checkbox" name="ruangan" id={{$item->id}}>
                        <label for={{$item->id}}>{{$item->nama}}</label>
                        <div class="content-ruangan">
                            <p>{{$item->kode}} | {{'Lantai ' .$item->lantai}}
                                <br><br>
                                <div class="photo-class">
                                    @foreach ($ruangan as $item)
                                        <div class="item">
                                            <img src="{{asset($item->foto)}}" alt="kelas" class="kelas1"> 
                                        </div>
                                    @endforeach
                                </div>
                            </p>
                        </div>
                    </li>
                </ul>
                @endforeach
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $(".menu-toggle").click(function () {
                $('nav').toggleClass('active');
            })
        });

        $(document).ready(function(){
            $('#filter_nama').on('keyup',function(){
                var queryNama= $(this).val();
                $.ajax({
                    url:"{{ route('cariRuanganByNamaMhs') }}",
                    type:"GET",
                    data:{'filter_nama':queryNama},
                    success:function(data){
                        $('#list_ruangan').html(data);
                    }
                });
            });

            $('#filter_tanggal_mulai, #filter_tanggal_selesai').on('input',function(){
                var queryTanggalMulai= $('#filter_tanggal_mulai').val();
                var queryTanggalSelesai= $('#filter_tanggal_selesai').val();
                console.log(queryTanggalMulai);
                $.ajax({
                    url:"{{ route('cariRuanganByTglMhs') }}",
                    type:"GET",
                    data:{
                        'filter_tanggal_mulai':queryTanggalMulai,
                        'filter_tanggal_selesai':queryTanggalSelesai
                    },
                    success:function(data){
                        $('#list_ruangan').html(data);
                    }
                });
            });
        });
    </script>

    <script>
        var inputTanggalMulai = document.getElementById('filter_tanggal_mulai');
        var inputTanggalSelesai = document.getElementById('filter_tanggal_selesai');

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var tanggalSekarang = yyyy + '-' + mm + '-' + dd;

        // Set nilai minimum pada elemen input tanggal
        inputTanggalMulai.setAttribute('min', tanggalSekarang);
        inputTanggalSelesai.setAttribute('min', tanggalSekarang);
    </script>
</body>
</html>