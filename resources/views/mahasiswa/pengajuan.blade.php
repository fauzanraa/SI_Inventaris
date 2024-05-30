<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/stylePengajuanMhs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SI Inventaris</title>
</head>
<body>
    <section class="pengajuan">
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
                    </ul>
                </nav>
            </div>
            <div class="avatar">
                <img src="/assets/avatar-user.png" alt="avatar" class="avatar-user">
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
                                    <span>Nama</span><input type="text" class="form-control" name="nama">
                                </div>
                                <div class="mb-3">
                                    <span>Tanggal Mulai</span><input type="date" class="form-control" value="" id="tanggal_mulai" name="tanggal_mulai">
                                </div>
                                <div class="mb-3">
                                    <span>Tanggal Selesai</span><input type="date" class="form-control" value="" id="tanggal_selesai" name="tanggal_selesai">
                                </div>
                                <div class="mb-3">
                                    <span>Ruangan</span>
                                    <div class="pilih-ruangan">
                                        <select name="ruangan" id="ruangan" disabled>
                                            <option value="">Pilihan Ruangan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3">
                                    <span>Dokumen</span>
                                    <input type="file" class="form-control" name="dokumen">
                                </div>
                                <button type="submit" id="submit" class="btn btn-primary mt-3">Ajukan</button>
                                <div class="kembali">
                                    <a href="" class="btn btn-secondary mt-3">Kembali</a>
                                </div>
                        </form> 
                    </div>         
                </div> 
            </div>
        </div>
    </section> 
    
    <script>
        $(document).ready(function(){
            $("#tanggal_mulai, #tanggal_selesai").on('input', function(){
                var inputTanggalMulai = $("#tanggal_mulai").val(); // Mengambil nilai dari input tanggal_mulai
                var inputTanggalSelesai = $("#tanggal_selesai").val(); // Mengambil nilai dari input tanggal_selesai
                var selectRuangan = $('#ruangan');
                if(inputTanggalMulai === '' || inputTanggalSelesai === '') {
                    selectRuangan.prop('disabled', true);
                } else {
                    selectRuangan.prop('disabled', false);
                }
            });
        });

        $(document).ready(function(){
            $("#tanggal_mulai, #tanggal_selesai").on('input', function(){
                var dataTanggalMulai = $('#tanggal_mulai').val();
                var dataTanggalSelesai = $('#tanggal_selesai').val();

                var kirimTanggal = {
                    data1 : dataTanggalMulai,
                    data2 : dataTanggalSelesai
                };

                $.ajax({
                    url: "http://127.0.0.1:8000/api/filterTanggal?tanggal_mulai=" +dataTanggalMulai+ "&tanggal_selesai=" +dataTanggalSelesai , // Ubah route sesuai dengan kebutuhan Anda
                    method: "GET", // Atur metode HTTP yang sesuai, misalnya POST
                    data : kirimTanggal,
                    success: function(response){
                        // Tanggapan dari server dapat ditangani di sini
                        console.log(response);
                    },
                    error: function(xhr, status, error){
                        // Tangani error jika terjadi
                        console.error(xhr.responseText);
                    }
                });
            });
        });
        
        $(document).ready(function(){
        $("#ruangan").click(function(){
            var dataTanggalMulai = $('#tanggal_mulai').val();
            var dataTanggalSelesai = $('#tanggal_selesai').val();
            fetch('http://127.0.0.1:8000/api/filterTanggal?tanggal_mulai=' +dataTanggalMulai+ '&tanggal_selesai=' +dataTanggalSelesai) 
            .then(response => response.json())
            .then(data => {
                $.each(data, function(key, value){
                    console.log(value.nama)
                    $("#ruangan").append('<option value="' + value.id + '">' + value.nama + '</option>');
                });
                })
                .catch(error => console.error('Error:', error));
        });
        });
    </script>
</body>
</html>