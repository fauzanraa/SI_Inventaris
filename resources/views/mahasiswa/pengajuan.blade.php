<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/mahasiswa/stylePengajuanMhs.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
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

        <div class="container">
            <div class="main-content">
                <form action="{{route('simpanPengajuanMhs')}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <h1 class="mb-5">Form Peminjaman Ruangan</h1>
                    <div class="mb-3">
                        <span>Nama</span><input type="text" class="form-control" name="nama">
                    </div>
                    <div class="mb-3">
                        <span>Tanggal Mulai</span><input type="date" class="form-control" name="tanggal_mulai">
                    </div>
                    <div class="mb-3">
                        <span>Tanggal Selesai</span><input type="date" class="form-control" name="tanggal_selesai">
                    </div>
                    <div class="mb-3">
                        <span>Ruangan</span>
                        <div class="pilih-ruangan">
                            <select name="ruangan" id="ruangan">
                                @foreach ($ruangan as $item)
                                    <option value="{{$item->id}}">{{$item->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="mb-3">
                        <span>Dokumen</span>
                        <input type="file" class="form-control" name="dokumen">
                    </div>
                    <button type="submit" class="btn btn-danger mt-3">Ajukan</button>
                    <div class="change-password">
                        <a href="">Kembali</a>
                    </div>
                </form>   
            </div>
        </div>
    </section>   
</body>
</html>