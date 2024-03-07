@extends('user/sidebar')

@section('main')

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="box1">
                <div class="row">                    
                    <div class="col-lg-1"></div>
                    <div class="col-lg-8 news">
                    <h2><b>-> Kategori </b></h2>
                         @include('user.leftmenu') 
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                

                <br>
                

                
                
            </div>
        </div>
        <div class="col-lg-9">
            <div class="box2">
                <div class="container-fluid">
                    <div class="row">
                        <!-- Start Ulang -->
                        @foreach($barang as $bar)
                            <?php 
                                if ($bar->pemilik == Auth::user()->email) {
                                    
                                }else{?>
                                    <div class="col-lg-6"><a href="{{ route('transaksi.show',$bar->id) }}">
                                        <div class="box3">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <center><img src="{{asset('storage/'.$bar->foto)}}" class="iconbar"></center>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <center><p class="textbar">{{$bar->namaBarang}}</p></center>
                                                        <hr size="4" color="black">
                                                        <div class="mini">Lokasi : {{$bar->daerah}}<br>
                                                        <?php 
                                                            if ($bar->stock > 0) {
                                                                echo "Tersedia : " . $bar->stock;
                                                            }else if ($bar->stock == 0) {
                                                                echo "Tersedia : 0";
                                                            }
                                                        ?>
                                                        </div>
                                                                            
                                                    </div>
                                                    
                                                </div>
                                            </div>

                                        </div></a>
                                    </div>
                            <?php }
                            ?>
                            
                        @endforeach

                        
                        <!-- end Ulang -->
                        
                    </div>
                    
                </div>


            </div>
        </div>
    </div>
</div>




@endsection