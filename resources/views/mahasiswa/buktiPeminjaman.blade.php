<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SI Inventaris</title>
    <style>
        table tr td{
            font-size: 13px;
        }

        table tr .text{
            text-align: right;
            font-size: 13;
        }
        table tr .text2{
            text-align: center;
        }
    </style>
</head>
<body>
    <center>
        <table>
            <tr>
                <td><img src="/assets/logo-jti.png" width="50" height="50" style="margin-right: 100px"></td>
                <td>
                    <center>
                        <font size="4">KEMENTRIAN PENDIDIKAN DAN KEBUDAYAAN</font><br>
                        <font size="2">POLITEKNIK NEGERI MALANG</font><br>
                        <font size="5">JURUSAN TEKNOLOGI INFORMASI</font><br>
                        <font size="2">Jalan Sukarno Hatta No 9, Malang</font><br>
                        <font size="2"><a href="jti.polinema.ac.id">jti.polinema.ac.id</a></font><br>
                    </center>
                </td>
            </tr>
            <tr>
                <td colspan="2"><br></td>
            </tr>
        </table>
        <table>
            <tr> 
                <hr width="625">
            </tr>
        </table>
        <table width="625">
            <tr>
                {{-- {{$tandaTerima->pluck('tanggal_approval')}}
                {{$tandaTerimaString = }} --}}
                <td class="text">Malang, 
                    @foreach($tandaTerima->pluck('tanggal_approval') as $tanggal)
                        {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}
                    @endforeach 
                </td>
            </tr>
        </table>
        <table >
            <tr>
                <td>Nomer</td>
                <td width="572"> : -</td>
            </tr>
            <tr>
                <td>Perihal</td>
                <td width="572"> : -</td>
            </tr>
        </table>
        <br>
        <table width="625">
            <tr>
                <td>
                    <font size="2">Kpd yth.<br>Petugas Kebersihan Gedung JTI<br>di tempat</font>
                </td>
            </tr>
        </table>
        <br>
        <table width="625">
            <tr>
                <td>
                    <font size="2">
                        Dengan adanya surat ini memberitahukan bahwa, atas nama   
                    </font>
                </td>
            </tr>
        </table>
        <br>
        <table >
            <tr>
                <td>Nama</td>
                <td width="525">: {{$tandaTerima->pluck('nama_user')->implode(',')}}</td>
            </tr>
            <tr>
                <td>Tanggal</td>
                {{-- {{
                $tanggalMulai = $tandaTerima->pluck('tanggal_mulai')->map(function($date) {
                    return \Carbon\Carbon::parse($date)->format('d-m-Y');
                });
                $tanggalMulaiString = $tanggalMulai->implode(',');
                }} --}}
                <td width="525">: 
                    @foreach($tandaTerima->pluck('tanggal_mulai') as $tanggal)
                        {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}
                    @endforeach
                    -
                    @foreach($tandaTerima->pluck('tanggal_selesai') as $tanggal)
                        {{ \Carbon\Carbon::parse($tanggal)->format('d-m-Y') }}
                    @endforeach     
                </td>
            </tr>
            <tr>
                <td>Pukul</td>
                <td width="525">: 19.00 - 20.00</td>
            </tr>
            <tr>
                <td>Ruangan</td>
                <td width="525">: {{$tandaTerima->pluck('nama_ruangan')->implode(',')}}</td>
            </tr>
        </table>
        <br>
        <table width="625">
            <tr>
                <td>
                    <font size="2">
                        Dapat menggunakan peminjaman ruangan yang telah diajukan sesuai yang tercantum pada poin diatas, 
                        dengan tetap menaati peraturan peminjaman yang berlaku. Demikian surat ini di sampaikan,
                        atas perhatian dan kerja samanya diucapkan terima kasih. 
                    </font>
                </td>
            </tr>
        </table>
        <br>
        <table width="625">
            <tr>
                <td width="430"></td>
                <td class="text2">Mengetahui, <br><br><br><br>Admin Jurusan</td>
            </tr>
        </table>
    </center>
</body>
</html>