@include('admin/header')

<header>
<aside class="sidebar">
    <div class="toggle">
        <a href="#" class="burger js-menu-toggle" data-toggle="collapse" data-target="#main-navbar">
            <span></span>
        </a>
    </div>
    <div class="side-inner">

    <div class="profile">
        <img src="{{asset('asset/img/2.png')}}" alt="Image" class="img-fluid">
        <h3 class="name">Admin</h3>
        <span class="country">| --------- |</span>
    </div>

        <?php
            $a = " ";
            $b = " ";

            if (Request::is('home') || Request::is('searchAdmin')) {
                $a = "active";
            }else if (Request::is('laporan')) {
                $b = "active";
            }
        ?>

        <div class="nav-menu">
          <ul>
            <li class="<?php echo $a ?>"><a href="{{ route('home')}}"><span class="icon-message mr-3"></span>Daftar Posting</a></li>
            <li class="<?php echo $b ?>"><a href="{{ route('laporan') }}"><span class="icon-share mr-3"></span>Daftar Laporan</a></li>
            <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><span class="icon-sign-out mr-3"></span>Keluar</a></li>
          </ul>
        </div>
    </div>
      
</aside>


<div class="head">

    <div class="container-fluid headlogin">
            <ul class="navbar-nav ml-auto pull-right">
                <li class="nav-item dropdown">
                    <?php
                        if (Request::is('home') || Request::is('searchAdmin')) {
                            ?>
                                <ul class="navbar-nav ml-auto pull-right" >
                                    <form id="find" action="/searchAdmin" method="POST" class="form-block form2">
                                    @csrf
                                    
                                    <li class="kir"><center><button type="submit"><span class="icon-search"></span></button></center></li>
                                    <li class="sync"><center>
                                        <input class="form-block" id="keyword" type="text" name="keyword" placeholder="Pencarian ..."></center>   
                                    </li>
                                    
                                    </form>
                                </ul>
                            <?php
                        }else{?>
                            <p class="logged"> Masuk Sebagai Admin </p>
                            <?php
                        }
                    ?>
                    
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item submenu" href="{{ route('logout') }}" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <span class="icon-sign-out mr-3"> Keluar
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
            </ul>
        </div>
</div>

</header>

<body style="background-image: url({{asset('asset/img/back.jpg')}});">

    <?php
        if (Request::is('home')) {?>
            <title>Daftar Barang</title>
            @yield('home')
        <?php }else if (Request::is('laporan')) {?>
            <title>Daftar Laporan</title>
            @yield('laporan')
        <?php }else if (Request::is('searchAdmin')) {?>
            <title>Cari Barang</title>
            @yield('home')
        <?php }

    ?>

<br><br>
<div class="foot">
    Diproduksi Oleh Dominus Lapidis
</div>

</body>
    

    