<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/vendor/font-awesome/css/font-awesome.min.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('assets/style.css')}}">
    <title></title>
    <style type="text/css">
        .home {
            background-image: url('{{asset('assets/gambar/notebook-336634_1920.jpg')}}');
        }
    </style>
</head>
<body>
    <nav class="navbarku">
            <img src="{{asset('assets/book.png')}}" width="50" id="logo" class="logo"> PerpusSMK
            
            <a href="/login" class="right btnku">Login</a>
            <a href="#kontak" class="right">Kontak</a>
            <a href="#produk" class="right">Mari Membaca</a>
            <a href="#tentang" class="right">Tentang Kami</a>
            <a href="#home" class="right">Beranda</a>
        </nav>
    
    <div class="home" id="home">
        
    </div>
    <div class="tentang" id="tentang">
        <center>
            <h3 style="color: #f5f5f5;">Tentang Kami</h3>
            <hr width="50%">
            <br>
        </center>
        <div class="box">
            <div class="row">
                <div class="col-md-6" style="padding: 30px;">
                    <p>Kami Disini menyediakan Layanan PeminjamanBuku Perpustakaan Berbasis Online. Dengan Menggunakan Media Digital Berupa Aplikasi Berbasis Web Ini Bagi Siswa/i SMK</p>
                    <br>
                    <p>Kami Menyediakan Berbagai Macam Jenis Buku Yang Dapat Dibaca Oleh Peminjam. Dan Peminjam Dapat Login Dengan Akun Yang Telah Di Buatkan Oleh Petugas Kami.</p>
                </div>
                <div class="col-md-6">
                    <img src="{{asset('assets/gambar/img-belajar-online.png')}}" width="300">
                </div>
            </div>
        </div>
    </div>
    <div class="produk" id="produk">
        <center>
            <h3>Mari Membaca</h3>
            <hr class="garis">
        </center>
        <div class="row">
                <div class="col-md-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-header">
                                <img src="{{asset('assets/gambar/book-1209805_1920.jpg')}}" width="100%" height="100%">
                            </div>
                            <div class="flip-card-front">
                                <center>
                                    <h4>Daftar Buku</h4>
                                    <hr>
                                    <label>Banyak Buku Yang Dapat Kamu Baca</label>
                                </center>
                            </div>
                            <div class="flip-card-back">
                                <center>
                                    <h4>Deskripsi</h4>
                                    <hr style="margin: 10px; margin-bottom: 20px;">
                                    <p>Disini terdapat banyak buku yang dapat kamu baca. Mulai dari novel, buku pengetahuan, sains, dan lainnya.
                                    </p>
                                    <hr>
                                    <p>Mari Mulai Membaca Sekarang!!!</p>
                                </center>
                            </div>
                            <div class="flip-card-back-footer">
                                <center>
                                    <a href="/login" class="btn btn-block btn-warning">Login</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-header">
                                <img src="{{asset('assets/gambar/library-979896_1920.jpg')}}" width="100%" height="100%">
                            </div>
                            <div class="flip-card-front">
                                <center>
                                    <h4>Pinjam Buku</h4>
                                    <hr>
                                    <label>Banyak Buku Yang Dapat Kamu Pinjam</label>
                                </center>
                            </div>
                            <div class="flip-card-back">
                                <center>
                                    <h4>Deskripsi</h4>
                                    <hr style="margin: 10px; margin-bottom: 20px;">
                                    <p>Disini terdapat banyak buku yang dapat kamu pinjam. Melalui aplikasi ini kamu dapat meminjam beberapa buku di perpustakaan tanpa harus takut lupa buku apa saja yang kamu pinjam.
                                    </p>
                                </center>
                            </div>
                            <div class="flip-card-back-footer">
                                <center>
                                    <a href="/login" class="btn btn-block btn-warning">Login</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-header">
                                <img src="{{asset('assets/gambar/library-869061_1920.jpg')}}" width="100%" height="100%">
                            </div>
                            <div class="flip-card-front">
                                <center>
                                    <h4>Manfaat Membaca</h4>
                                    <hr>
                                    <label>Banyak Manfaat Yang Akan Kamu Dapat Dengan Membaca Buku</label>
                                </center>
                            </div>
                            <div class="flip-card-back">
                                <center>
                                    <h4>Deskripsi</h4>
                                    <hr style="margin: 10px; margin-bottom: 20px;">
                                    <p>Buku adalah jendela dunia. Pernah mendengar kalimat tersebut?. Mari mulai membaca dari sekarang agar kamu dapat merasakan manfaatnya membaca.
                                    </p>
                                </center>
                            </div>
                            <div class="flip-card-back-footer">
                                <center>
                                    <a href="/login" class="btn btn-block btn-warning">Login</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="flip-card">
                        <div class="flip-card-inner">
                            <div class="flip-card-header">
                                <img src="{{asset('assets/gambar/computer-768696_1920.jpg')}}" width="100%" height="100%">
                            </div>
                            <div class="flip-card-front">
                                <center>
                                    <h4>Catatan Digital</h4>
                                    <hr>
                                    <label>Takut Catatan Perpustakaan Hilang??</label>
                                </center>
                            </div>
                            <div class="flip-card-back">
                                <center>
                                    <h4>Deskripsi</h4>
                                    <hr style="margin: 10px; margin-bottom: 20px;">
                                    <p>Aplikasi ini menyediakan catatan bagi peminjam buku, tanpa harus menggunakan kertas sebagai catatannya.
                                        Melalui catatan digital ini kamu akan mudah mengetahui mengenai apa saja buku yang kamu pinjam.
                                    </p>
                                </center>
                            </div>
                            <div class="flip-card-back-footer">
                                <center>
                                    <a href="/login" class="btn btn-block btn-warning">Login</a>
                                </center>
                            </div>
                        </div>
                    </div>
                </div>
        </div>
    </div>
    <div class="kontak" id="kontak">
        <center>
            <h2>Kontak</h2>
            <hr class="garis" style="width: 20%;">
            <br>
        </center>
        <div class="container">
            <div class="row">
                <div class="col-md-4 bag1">
                    <h3>Kontak Kami</h3>
                    <hr width="200px" align="left">
                    <div class="row" style="font-size: 20px;">
                        <div class="col-md-1">
                            <i class="fa fa-envelope"></i>
                        </div>
                        <div class="col-md-11">
                            <a href="" style="color: white;"><u>info@perpussmk.id</u></a>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-phone"></i>
                        </div>
                        <div class="col-md-11">
                            <a href="" style="color: white;"><u>(+62)89626077978</a>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-map-marker"></i>
                        </div>
                        <div class="col-md-11">
                            Jl. Sayuran Kec.Dayeuhkolot Kab. Bandung 40239  
                        </div>
                    </div>
                </div>
                <div class="col-md-4 bag1">
                    <h3>Folow Us</h3>
                    <hr style="width: 200px;" align="left">
                    <div class="row" style="font-size: 20px;">
                        <div class="col-md-1">
                            <i class="fa fa-facebook-square"></i>
                        </div>
                        <div class="col-md-11">
                            <a href="" style="color: white;">Facebook</a>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-instagram"></i>
                        </div>
                        <div class="col-md-11">
                            <a href="" style="color: white;">Instagram</a>
                        </div>
                        <div class="col-md-1">
                            <i class="fa fa-twitter-square"></i>
                        </div>
                        <div class="col-md-11">
                            <a href="" style="color: white;">Twitter</a>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <center>
                        <img src="{{asset('assets/gambar/img-studi-kasus.png')}}" width="200">
                    </center>
                </div>
            </div>
        </div>
    </div>
    <div class="footer bag1">
        <p>Copyright@perpussmk2019</p>
    </div>
<script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
<script type="text/javascript" src="{{asset('assets/app.js')}}"></script>
</body>
</html>