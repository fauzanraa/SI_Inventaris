@include('sweetalert::alert')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/urt/styleKonfirmUrt.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/fontawesome/css/all.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <title>SI Inventaris</title>
</head>
<body class="bg-body-tertiary">
    <section class="urt">
        <div class="sidebar">
            <nav>
                <ul>
                    <li class="nav-item">
                            <a href="{{ route('indexUrt')}}" class="nav-link ">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-house"></i>
                                    <span>Dashboard</span>
                                </p>
                            </a>
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('cekPengajuanUrt')}}" class="nav-link {{ \Request::is('url*') ? 'active' : ''}}">
                                <p>
                                    <i class="nav-icon fas fa-solid fa-pen-to-square"></i>
                                    <span>Konfirmasi Pengajuan</span>
                                </p>
                            </a>    
                    </li>
                    <li class="nav-item">
                            <a href="{{ route('laporanUrt')}}" class="nav-link ">
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
                    <p>Selamat Datang, Urusan Rumah Tangga</p>
                </div>
                <div class="logo-jti">
                    <img src="/assets/logo-jti.png">
                </div>
                <div class="vertical_line">
                </div>
            </div>

            <div class="card-container">
                <div class="main-content">
                    <form action="{{url('/urt/cekPengajuan/'.$data->id)}}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    {!! method_field('PUT') !!}
                    <h3 class="mb-5">Konfirmasi Pengajuan</h3>
                    <div class="mb-3">
                        <p>Status Konfirmasi :</p>
                        <input type="radio" id="hasil" name="status" value="" hidden>
                        <input type="radio" id="diterima" name="status" value="Diterima">
                        <label for="diterima">Diterima</label><br>
                        <input type="radio" id="tidak_diterima" name="status" value="Tidak Diterima">
                        <label for="tidak_diterima">Tidak Diterima</label><br>
                    </div>
                    <div class="mb-3">
                        <p><label for="catatan">Catatan :</label></p>
                        <input type="text" class="form-control" id="note" name="note" placeholder="Silahkan beri catatan" disabled>
                        </textarea>
                    </div>
                    <div class="button-save">
                        <button type="submit" class="btn mt-3" id="save">Simpan</button>
                    </div>
                </form>
                <a href="{{ route('cekPengajuanUrt') }}" class="btn btn-sm btn-default mt-2">Batal</a>
                </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function(){
            $("#tidak_diterima").on('input', function(){
                var inputCatatan = $("#tidak_diterima").val(); 
                var notes = $('#note');
                if(inputCatatan === 'Tidak') {
                    notes.prop('disabled', true);
                } else {
                    notes.prop('disabled', false);
                }
            });
        });
    </script>
    
</body>
</html>