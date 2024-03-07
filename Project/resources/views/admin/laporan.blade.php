@extends('admin.sidebar')

@section('laporan')
<?php
    use App\Models\user; 
    $empty = 0;
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box4">
                <div class="row">
                    <div class="col-lg-12">
                        <center><h3 class="news"><b>| --- Daftar Laporan --- |</b></h3>
                        <table class="hist table table-bordered">
                            <thead class="bgt">
                                
                                <td><b>Nama Barang</b></td>
                                <td><b>Foto</b></td>
                                <td><b>Pemilik</b></td>
                                <td><b>Alamat</b></td>
                                <td><b>Laporan</b></td>
                                
                            </thead>
                            @foreach($laporan as $lap)
                            <?php
                                $empty = 1;
                            ?>
                            <tbody class="news">
                                <td>{{$lap->namaBarang}} </td>
                                <td><img src="{{asset('storage/'.$lap->foto)}}" class="iconPost"></td>
                                <td>
                                    <?php
                                        $name = user::all()->where('email', $lap->pemilik)->first();
                                        echo $name->name;
                                    ?>


                                </td>
                                <td>{{$lap->alamat}}</td>
                                <td>{{$lap->komentar}}</td>
                                
                            </tbody>
                            @endforeach
                            @if($empty == 0)
                                <tbody>
                                    <td colspan="5" class="news">Tidak Ada Laporan</td>
                                    
                                </tbody>

                            @endif
                        </table></center>
                    </div>
                </div>
                    
            </div>
        </div>
        
    </div>
</div>
@endsection