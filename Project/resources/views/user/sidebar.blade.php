@include('user/header')

<header>
<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">
    <?php
        use App\Models\user;
        $gam = user::all()->where('email', Auth::user()->email)->first();
        $cekProfil = 0;
        
        if ($gam->foto == "-") {
            $cekProfil = 1;
        }else{
            $cekProfil = 0;
        }
    ?>
    <div class="profile">
        @if($cekProfil == 0)
            <img src="{{asset('storage/'.$gam->foto)}}" alt="Image" class="img-fluid leftImg">
        @endif 

        @if ($cekProfil == 1)
            <img src="{{asset('asset/img/2.png')}}" alt="Image" class="img-fluid">
        @endif
        
        <h3 class="name">{{Auth::user()->name}}</h3>
        <span class="country">{{Auth::user()->tlp}}</span>
    </div>
        <?php
            $a = " ";
            $b = " ";
            $c = " ";
            $d = " ";
            $e = " ";

            if (Request::is('transaksi/create')) {
                $c = "active";
            }else if (Request::is('pesan') || Request::is('pesanC/*')) {
                $b = "active";
            }else if (Request::is('home') || Request::is('cari') || Request::is('transaksi/*/edit') || Request::is('transaksi/*')) {
                $a = "active";
            }else if (Request::is('ubah') || Request::is('riwayatBooking')  || Request::is('permintaan') ||  Request::is('posting')) {
                $d = "active";
            }else if (Request::is('profil') ) {
                $e = "active";
            }
        ?>

        <div class="nav-menu ">
          <ul>
            <li class="<?php echo $e ?>"><a href="{{ route('profil') }}"><span class="icon-people mr-3"></span>Profil</a></li>
            <li class="<?php echo $a ?>"><a href="{{ route('home') }}"><span class="icon-search mr-3"></span>Pencarian Barang</a></li>
            <li class="<?php echo $b ?>"><a href="{{ route('pesan')}}"><span class="icon-message mr-3"></span>Percakapan</a></li>
            <li class="<?php echo $c ?>"><a href="{{ route('transaksi.create') }}"><span class="icon-share mr-3"></span>Berbagi</a></li>
            
            <li class="<?php echo $d ?>"><a href="#history" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><span class="icon-history mr-3"></span>Riwayat</a></li>
                <ul class="collapse list-unstyled" id="history">
                    <li>
                        <a href="{{ route('posting')}}"><span class="icon-upload mr-3"></span>Posting</a>
                    </li>
                    <li>
                        <a href="{{ route('permintaan')}}"><span class="icon-list mr-3"></span>Permintaan</a>
                    </li>
                    <li>
                        <a href="{{ route('riwayatBooking')}}"><span class="icon-check mr-3"></span>Booking</a>
                    </li>
                    </ul>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon-sign-out mr-3"></span>Keluar</a></li>
          </ul>
        </div>
    </div>
      
</aside>


<div class="head">

    <div class="container-fluid headlogin">
        <?php
            if (Request::is('home') || Request::is('transaksi/*/edit') || Request::is('cari') ) {?>
                <ul class="navbar-nav ml-auto pull-right" >
                    
                    <form id="find" action="/cari" method="POST" class="form-block form2">
                            @csrf
                    <li class="kir"><center><button type="submit"><span class="icon-search"></span></button></center></li>
                    <li class="sync"><center>
                        <input class="form-block" id="keyword" type="text" name="keyword" placeholder="Pencarian ..."></center>   
                    </li>
                    </form> 
                    
                </ul>

            <?php
            }else{?>

                <ul class="navbar-nav ml-auto pull-right">
                    <li class="nav-item dropdown">
                        <a id="navbarDropdown" class="nav-link dropdown-toggle menu" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if($cekProfil == 0)
                                <img src="{{asset('storage/'.$gam->foto)}}" class="icon">
                            @endif 
                            
                            @if ($cekProfil == 1)
                                <img src="{{asset('asset/img/1.png')}}" class="icon">
                            @endif
                        </a>
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item submenu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                        document.getElementById('logout-form').submit();">
                            <span class="icon-sign-out mr-3"> Keluar
                            </a>
                            
                        </div>
                    </li>
                </ul>

            <?php
            }
        
        ?>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>

            
        </div>
</div>

</header>

<body style="background-image: url({{asset('asset/img/back.jpg')}});">

    <?php
        if (Request::is('home')) {?>
            <title>Home</title>
            @yield('main')
        <?php }else if (Request::is('pesan')) {?>
            <title>Pilih Kontak</title>
            @yield('pesan')
        <?php }else if (Request::is('transaksi/*/edit')) {?>
            <title>Kategori Barang</title>
            @yield('main')
        <?php }else if (Request::is('cari')) {?>
            <title>Pencarian Barang</title>
            @yield('main')
        <?php }else if (Request::is('transaksi/create')) {?>
            <title>Posting Baru</title>
            @yield('posting')
        <?php }else if (Request::is('transaksi/*')) {?>
            <title>Rincian Barang</title>
            @yield('pilih')
        <?php }else if (Request::is('ubah')) {?>
            <title>Ubah Postingan</title>
            @yield('ubahPost')
        <?php }else if (Request::is('posting')) {?>
            <title>Riwayat Posting</title>
            @yield('riwayatPosting')
        <?php }else if (Request::is('permintaan')) {?>
            <title>Riwayat Permintaan</title>
            @yield('riwayatPermintaan')
        <?php }else if (Request::is('riwayatBooking')) {?>
            <title>Riwayat Booking</title>
            @yield('riwayatBooking')
        <?php }else if (Request::is('pesanC/*')) {?>
            <title>Percakapan</title>
            @yield('pilihpesan')
        <?php }else if (Request::is('profil')) {?>
            <title>Profil Anda</title>
            @yield('profil')
        <?php }


    ?>




<?php  
if (Request::is('transaksi/create') || Request::is('profil')) {?>
    <div class="foot2">
        2021 © Dominus Lapidis
    </div>
<?php } else {?>
    <br><br>
    <div class="foot">
        2021 © Dominus Lapidis
    </div>
<?php }
?>


</body>
    

    