<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/styleIndexMhs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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
                        <li class="navbar">Beranda</li>
                        <li class="navbar">Cek Ruangan</li>
                        <li class="navbar">Pengajuan</li>
                        <li class="navbar">Tanda Terima</li>
                    </ul>
                </nav>
            </div>
            <div class="avatar">
                <img src="/assets/avatar-user.png" alt="avatar" class="avatar-user">
            </div>
        </div>
        
        <div class="hero">
            <div class="bg-hero">
                <div class="text-hero">
                    <h1>Butuh Ruangan Siap Pakai <br> Di Kampus ?</h1>
                    <p>
                    Pinjam ruang fasilitas kampus untuk kegiatan kemahasiswaan dengan mudah. Kamu juga bisa cari dan 
                    <br>cek ketersediaan ruangan di kolom search dibawah ini.</p>
                </div>
                <div class="search-hero">
                    <form action="{{route('cariRuangan')}}" method="GET" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="mb-3">
                            <input type="text" class="form-control" id="search" name="nama_ruangan" placeholder="Cari Ruangan">
                            <button type="submit" class="btn btn-primary" hidden>Submit</button>
                        </div>
                    </form>
                </div>
                <img src="/assets/hero-user.png" alt="bg-user" class="bg-user">
            </div>   
        </div>

        <div class="content">
            <div class="photo-class">
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
                <div class="item">
                    <img src="/assets/kelas/kelas1.png" alt="kelas" class="kelas1"> 
                </div>
            </div>
            <div class="watch-more mt-4" >
                <a href="">Lihat lebih banyak</a>
            </div>
            <div class="check-class mt-5">
                <h1>Apa Ruangan Ini Tersedia ?</h1>
                <div class="input-check">
                    <div class="row">
                        <form action="{{route('cariRuangan')}}" method="GET" enctype="multipart/form-data">
                            {{ csrf_field() }}
                            {{-- <div class="ruangan">
                                <div class="mb-3">
                                    <label for="ruangan" class="form-label">Ruangan</label>
                                    <input type="text" class="form-control" name="ruangan" id="ruangan" placeholder="Pilih Ruangan">
                                </div>
                            </div> --}}
                            <div class="tanggal_mulai">
                                <div class="mb-3">
                                    <label for="tanggal_mulai" class="form-label">Tanggal Mulai</label>
                                    <input type="date" name="tanggal_mulai" class="form-control">
                                </div>
                            </div>
                            <div class="tanggal_selesai">
                                <div class="mb-3">
                                    <label for="tanggal_selesai" class="form-label">Tanggal Selesai</label>
                                    <input type="date" name="tanggal_selesai" class="form-control">
                                </div>
                            </div>
                            <div class="submit-check">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                            {{-- <br><span>*boleh mengisi ruangan/tanggal saja</span> --}}
                        </form>        
                    </div>
                </div>
            </div>
            <div class="hint-user">
                <h1>Bingung Cara Pinjamnya? Yuk Ikuti <br> Langkah-langkahnya</h1>
                <div class="hint">
                    <div class="row">
                        <div class="col-lg-6">
                            <img src="/assets/notebooks-user.png" alt="" class="notebooks-user">
                        </div>
                        <div class="col-lg-6">
                            <p>
                                1. Pastikan anda sudah mengecek ketersedian ruangan <br>
                                2. Jika sudah menemukan ruangan yang ingin dipinjam, silahkan 
                                <br> akses link berikut  <br>
                                3. Isikan dokumen yang terdapat pada link tersebut <br>
                                4. Lalu pergi ke halaman pengajuan <br>
                                5. Nanti akan muncul form pengajuan, isi semua form sesuai 
                                <br> pengajuan yang dilakukan. Pilih ajukan jika pengisian 
                                <br> form sudah selesai <br>
                                6. Tunggu hingga pengajuan dikonfirmasi oleh pihak Admin 
                                <br> dan Urusan Rumah Tangga <br>
                                7. Cek pengajuan ke halaman tanda terima, jika pengajuan 
                                <br> dikonfirmasi cetak tanda terima lalu berikan kepada pihak OB 
                                <br> untuk menggunakan kelas
                            </p>
                        </div>
                    </div>
                    <div class="footer">
                    <img src="/assets/footer-user.png" alt="" class="footer-user">
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>