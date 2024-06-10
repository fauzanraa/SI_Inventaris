<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/stylePengajuanMhs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" integrity="sha512-vKMx8UnXk60zUwyUnUPM3HbQo8QfmNx7+ltw8Pm5zLusl1XIfwcxo8DbWCqMGKaWeNxWA8yrx5v3SaVpMvR3CA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        <div class="container">
            <div class="main-content">
                <div class="row">
                    <div class="pengajuan-image col-lg-6">
                            <img src="\assets\content-pengajuan.png" alt="">
                    </div>
                    <div class="pengajuan-inputan col-lg-6">
                        <form action="{{route('simpanPengajuanMhs')}}" method="post" enctype="multipart/form-data">
                            {{ csrf_field() }}
                                <div class="mb-3 mt-5">
                                    <span>Nama</span><input type="text" class="form-control" name="nama" value="{{$user->nama}}" disabled>
                                </div>
                                <span hidden>Id</span><input type="text" class="form-control" name="id" value="{{$user->id}}" hidden>
                                <div class="mb-3">
                                    <span>Tanggal Mulai</span><input type="date" class="form-control @error('tanggal_mulai') is-invalid @enderror" value="" id="tanggal_mulai" name="tanggal_mulai">
                                    @error('tanggal_mulai')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <span>Tanggal Selesai</span><input type="date" class="form-control @error('tanggal_selesai') is-invalid @enderror" value="" id="tanggal_selesai" name="tanggal_selesai">
                                    @error('tanggal_selesai')
                                    <div class="invalid-feedback">
                                        {{$message}}
                                    </div>
                                @enderror
                                </div>
                                <div class="mb-3">
                                    <span>Ruangan</span>
                                    <div class="pilih-ruangan">
                                        <select name="ruangan" id="ruangan" class="input-ruangan form-select @error('ruangan') is-invalid @enderror" >
                                            <option value="">Pilihan Ruangan</option>
                                            @error('ruangan')
                                                <div class="invalid-feedback">
                                                    {{$message}}
                                                </div>
                                            @enderror
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span>Dokumen</span>
                                    <input type="file" class="form-control @error('dokumen') is-invalid @enderror" name="dokumen">
                                    @error('dokumen')
                                        <div class="invalid-feedback">
                                            {{$message}}
                                        </div>
                                    @enderror
                                </div>
                                <div class="button-submit">
                                    <button type="submit" id="submit" class="btn btn-secondary mt-3">Ajukan</button>
                                </div>
                                <div class="button-back">
                                    <a href="{{route('indexMahasiswa')}}" class="btn btn-secondary mt-3">Kembali</a>
                                </div>
                        </form> 
                    </div>         
                </div> 
            </div>
        </div>
    </section> 
    
    <script>
        $(document).ready(function () {
            $(".menu-toggle").click(function () {
                $('nav').toggleClass('active');
            })
        })

        // $(document).ready(function(){
        //     $("#tanggal_mulai, #tanggal_selesai").on('input', function(){
        //         var inputTanggalMulai = $("#tanggal_mulai").val(); // Mengambil nilai dari input tanggal_mulai
        //         var inputTanggalSelesai = $("#tanggal_selesai").val(); // Mengambil nilai dari input tanggal_selesai
        //         var selectRuangan = $('#ruangan');
        //         if(inputTanggalMulai === '' || inputTanggalSelesai === '') {
        //             selectRuangan.prop('disabled', true);
        //         } else {
        //             selectRuangan.prop('disabled', false);
        //         }
        //     });
        // });
        
        $(document).ready(function(){
        $("#ruangan").click(function(){
            var dataTanggalMulai = $('#tanggal_mulai').val();
            var dataTanggalSelesai = $('#tanggal_selesai').val();
            fetch('http://127.0.0.1:8000/api/filterTanggal?tanggal_mulai=' +dataTanggalMulai+ '&tanggal_selesai=' +dataTanggalSelesai) 
            .then(response => response.json())
            .then(data => {
                // $('#ruangan').html('')
                $.each(data, function(key, value){
                    console.log(value.nama)
                    console.log(value.id)
                    $("#ruangan").append('<option value="' + value.id + '">' + value.nama + '</option>');
                });
            })
                .catch(error => console.error('Error:', error));
        });
        });
    </script>

    <script>
        var inputTanggalMulai = document.getElementById('tanggal_mulai');
        var inputTanggalSelesai = document.getElementById('tanggal_selesai');

        var today = new Date();
        var dd = String(today.getDate()).padStart(2, '0');
        var mm = String(today.getMonth() + 1).padStart(2, '0'); //January is 0!
        var yyyy = today.getFullYear();
        var tanggalSekarang = yyyy + '-' + mm + '-' + dd;

        // Set nilai minimum pada elemen input tanggal
        inputTanggalMulai.setAttribute('min', tanggalSekarang);
        inputTanggalSelesai.setAttribute('min', tanggalSekarang);
    </script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    @if (Session::has('message'))
        <script>
            toastr.success("{{ Session::get('message')}}", {timeOut:1200});
        </script>
    @endif

    @if (Session::has('error'))
        <script>
            toastr.warning("{{ Session::get('error')}}", {timeOut:1200});
        </script>
    @endif

</body>
</html>