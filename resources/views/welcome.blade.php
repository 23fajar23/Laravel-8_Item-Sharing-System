<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>SIBERANG (Sistem Berbagi Barang)</title>
        <link rel="stylesheet" href="{{asset('css/styleAwal.css')}}">
        <link rel="stylesheet" href="{{asset('asset/css/bootstrap.min.css')}}">
        <script src="{{asset('asset/js/jquery.min.js')}}"></script>
        <script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
    </head>
    <body>
        <div class="container-fluid head">
            <ul class="baru2">
                <li><img src="{{asset('asset/img/favicon.png')}}" style="width:40px; margin-top:-3px;"></li>
                <li><h4>SIBERANG (Sistem Berbagi Barang)<h4></li>
            </ul>
            <ul class="baru">
                <a href="{{ route('login') }}" class="bersih"><li>Masuk</li></a>
                <a href="{{ route('register') }}" class="bersih"><li>Daftar</li></a>
            </ul>
        </div>
        <div class="bg">
            <div class="slide">
                <center>
                <div class="container-inner">
                    <br>
                    <div id="WJSlider" class="carousel slide" data-ride="carousel">

                        <ol class="carousel-indicators">
                        <li data-target="#WJSlider" data-slide-to="0" class="active"></li>
                        <li data-target="#WJSlider" data-slide-to="1"></li>
                        <li data-target="#WJSlider" data-slide-to="2"></li>
                        <li data-target="#WJSlider" data-slide-to="3"></li>
                            
                        </ol>

                        <div class="carousel-inner" role="listbox">

                            <div class="item active">
                                <img src="{{asset('asset/img/b3.png')}}" alt="slide1" class="brad" width="500px">
                                <div class="carousel-caption ">
                                    <div class="bannerText">
                                        <h2>Barang Tak Terpakai ???</h2>
                                        <p>Ya Dibagikan Saja</p>
                                    </div>
                                    
                                </div>
                            </div>

                            <div class="item">
                                <img src="{{asset('asset/img/b1.png')}}" alt="slide2" class="brad" width="500px">
                                <div class="carousel-caption">
                                    <div class="bannerText">
                                        <h3>Segala Jenis Barang</h3>
                                        <p>Bisa Anda Bagikan</p>
                                    </div>
                                </div>
                            </div>
                    
                            <div class="item">
                                <img src="{{asset('asset/img/b2.png')}}" alt="slide3" class="brad" width="500px">
                                <div class="carousel-caption">
                                    <div class="bannerText">
                                        <h3>Barang Bekas Anda</h3>
                                        <p>Dapat Membuat Orang Lain Tersenyum</p>
                                    </div>
                                </div>
                            </div>

                            <div class="item">
                                <img src="{{asset('asset/img/b4.png')}}" alt="slide4" class="brad" width="500px">
                                <div class="carousel-caption">
                                    <div class="bannerText">
                                        <h3>Ringan Tanganlah</h3>
                                        <p>Kepada Yang Membutuhkan</p>
                                    </div>
                                </div>
                            </div>

                    
                        </div>

                        <!-- Left and right controls -->
                        <a class="left carousel-control" href="#WJSlider" role="button" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
                        <span class="sr-only">Kembali</span>
                        </a>
                        <a class="right carousel-control" href="#WJSlider" role="button" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
                        <span class="sr-only">Lanjut</span>
                        </a>
                    </div>
                </div>
                </center>
            </div>

            <div class="container-fluid">
                <div class="col-lg-12">
                    <hr width="300px">
                </div>
            </div>

            <div class="container">
                
                <section class="grid">

                <!-- Bagian 1 -->
                <div class="image-order">
                    <img src="{{asset('asset/img/i2.jpeg')}}" class="img2">
                </div>
                <div class="text-order text">
                    <p><b>Kepedulian</b></p>
                        Peduli terhadap sesama, ringan tangan kepada yang membutuhkan, barang tidak terpakai anda masih dapat berguna bagi orang lain. berbaik hati dan sambungkan tali silaturahmi.
                    <p></p>
                    <hr style="width: 50%;">
                    <p>
                    <a href="{{route('home')}}"><center><button type="button" class="btn btn-info scanfcode1 shad"><div class="btnblack">Rincian...</div></button></center></a>
                    </p>

                </div>

                <!-- Bagian 2 -->
                <div class="image-food">
                    <img src="{{asset('asset/img/i1.jpg')}}" class="img1">
                </div>
                <div class="text-food text">
                    <p><b>Komunikasi</b></p>
                        Kemudahan akses dalam komunikasi, mudah digunakan, terdapat fitur yang telah kami sediakan sebagai media dalam berkomunikasi dalam transaksi.
                    <hr style="width: 50%;">
                    <a href="{{route('home')}}"><center><button type="button" class="btn btn-info scanfcode1 shad"><div class="btnblack">Rincian...</div></button></center></a>


                </div>
                <!-- Bagian 3 -->
                <div class="image-drink">
                    <img src="{{asset('asset/img/i4.png')}}" class="img2">
                </div>
                <div class="text-drink text">
                    <p><b>Dermawan</b></p>
                    Membantu menghubungkan anda dengan orang lain, ringan tangan kepada sesama yang membutuhkan. Sifat terpuji dan layak diapresiasi.
                    <hr style="width: 50%;">
                    <a href="{{route('home')}}"><center><button type="button" class="btn btn-info scanfcode1 shad"><div class="btnblack">Rincian...</div></button></center></a>

                </div>
                <!-- Bagian 4 -->
                <div class="image-checkin">
                    <img src="{{asset('asset/img/i3.png')}}" class="img1">
                </div>
                <div class="text-checkin text">
                    <p><b>Teknologi</b></p>
                        Menggunakan framework yang teruji untuk aplikasi, mudah digunakan, dapat diakses kapan saja dan dimana saja, bebas digunakan oleh oleh siapa saja.
                    <p></p>
                    <hr style="width: 50%;">
                    <p>
                    <a href="{{route('home')}}"><center><button type="button" class="btn btn-info scanfcode1 shad"><div class="btnblack">Rincian...</div></button></center></a>
                        
                    </p>
                </div>
                </section>

                <div class="what">
                    <hr style="width: 20%;">
                    <p>Apa Kata Pengunjung ???</p>
                    <hr style="width: 25%;">
                </div>

                <ul class="comment">
                    <li>
                        <div style="font-size: 17px;font-weight: bold;">
                            <img src="{{asset('asset/img/profil/p2.png')}}" class="photo"><br>
                            <br>Harist Dani 	
                        </div>

                        <hr style="width: 30%">
                        <div style="width: 240px;">		
                        Saya pikir itu bagus dan <br> bermanfaat bagi masyarakat
                        </div>

                    </li>
                    <li>
                        <div style="font-size: 17px;font-weight: bold;">
                            <img src="{{asset('asset/img/profil/p1.jpg')}}" class="photo"><br>
                            <br>Fajar Darussalam 	
                        </div>

                        <hr style="width: 30%">
                        <div style="width: 240px;">		
                            Situs ini sangat membantu <br>dan mudah digunakan
                        </div>

                    </li>
                    <li>
                        <div style="font-size: 17px;font-weight: bold;">
                            <img src="{{asset('asset/img/profil/p3.jpg')}}" class="photo"><br>
                            <br>Ilham Nur Febrianto 	
                        </div>

                        <hr style="width: 30%">
                        <div style="width: 240px;">		
                            Membantu untuk memberikan <br>dan mencari barang kebutuhan
                        </div>

                    </li>

                </ul>

                <hr class="hr">
            </div>
        

        </div>
        
        <div class="foot">
            2021 © Dominus Lapidis
        </div>
    </body>
</html>

