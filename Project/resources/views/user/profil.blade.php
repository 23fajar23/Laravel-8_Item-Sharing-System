@extends('user.sidebar')

@section('profil')


<?php
    $cekProfil2 = 0;
        
    if ($akun->foto == "-") {
        $cekProfil2 = 1;
    }else{
            
    }
?>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box9">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 we news">
                    <form method="POST" action="/profilUpdate" id="profile" enctype="multipart/form-data">
                        @csrf
                        <center><h3><b>|--- Profil anda ---|</b></h3><br>
                        @if($cekProfil2 == 0)
                            <img src="{{asset('storage/'.$akun->foto)}}" alt="Image" class="img-fluid showprofil">
                        @endif 

                        @if ($cekProfil2 == 1)
                            <img src="{{asset('asset/img/2.png')}}" alt="Image" class="img-fluid showprofil">
                        @endif
                            <br></center><br>


                        Nama : <br>
                        <input id="name" value="{{Auth::user()->name}}" type="text" class="form-control" name="name" required="required"><br>
                        
                        Nomor Telp : <br>
                        <input id="tlp" value="{{Auth::user()->tlp}}" type="number" class="form-control" name="tlp" required="required"><br>

                        E-Mail : <br>
                        <input id="email" value="{{Auth::user()->email}}" type="text" class="form-control" name="email" required="required" disabled><br>

                        Alamat : <br>
                        <input id="alamat" value="{{Auth::user()->alamat}}" type="text" class="form-control" name="alamat" required="required"><br>
                        

                        Foto : <br>
                        <input type="file" name="foto" class="form-control" id="foto" accept="image/*">

                        

                        <button type="submit" class="btn btn-primary sub scanfcode">Ubah</button>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                    
            </div>
        </div>
        
    </div>
</div>

@endsection
