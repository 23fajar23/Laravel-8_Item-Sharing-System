@extends('user.sidebar')

@section('riwayatPermintaan')

@if ($message = Session::get('success'))
<br>
<div class="alert alert-success bg-dark aler" >
    <p><b>{{ $message }}</b></p>
</div>
@endif

<div class="container-fluid">
    <div class="box4 news">
        <div class="row">
            <div class="col-lg-12">
                <center><h3><b>--- Riwayat Permintaan --- </b></h3>
                <table class="hist table table-bordered">
                    <thead class="bgt">
                        <td width="220px"><b>Nama Barang</b></td>
                        <td><b>Pencari</b></td>
                        <td><b>Metode Kirim</b></td>
                        <td><b>Jumlah</b></td>
                        <td><b>Status</b></td>
                        <td><b>Aksi</b></td>
                    </thead>
                        <?php
                            use App\Models\user; 
                            use App\Models\barang;      
                            use Illuminate\Support\Facades\Auth;         
                            $cek = 1;  
                            $empty = 0;         
                        ?>
                    @foreach($mohon as $mohon2)
                    <?php
                        
                        $cek++;
                        if ($mohon2->pencari != Auth::user()->email && $mohon2->pemilik == Auth::user()->email) {
                            $empty = 1;?>
                            <?php
                                $bar = barang::all()->where('id', $mohon2->idBarang)->first();
                                $bar2 = user::all()->where('email', $mohon2->pencari)->first();
                                              
                                $ok = user::all()->where('email', $mohon2->pemilik)->first();                            
                            if ($bar->status == NULL) {
                                # code...
                            
                            ?>

                            <tbody class="news">
                                <td>{{$mohon2->namaBarang}}</td>
                                
                                    
                                <td><?php echo $bar2->name; ?></td>
                                <td>{{$mohon2->kirim}}</td>
                                <td>{{$mohon2->jumlah}}</td>
                                <td>{{$mohon2->status}}</td>
                                <td>
                                    <button class="btn btn-primary scanfcode" data-toggle="modal" data-target="<?php echo "#rincian".$cek ?>"><b>Rincian</b></button>
                                    

                                </td>
                            </tbody>

                            <div class="modal fade" id="<?php echo "rincian".$cek ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "rincian".$cek ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bgNews">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="<?php echo "rincian".$cek ?>" style="color:blue;"><b> |--- Permintaan Barang ---|</b> </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style="text-align:left;color:black;">
                                                
                                                <label for="namaBarang" class="col-sm-12 control-label"><b>Nama Barang &ensp; : </b>{{$mohon2->namaBarang}}</label>
                                                <label for="kategori" class="col-sm-12 control-label"><b>Kategori &ensp; &ensp; &ensp; &ensp; : </b>{{$bar->kategori}}</label>
                                                <label for="pencari" class="col-sm-12 control-label"><b>Pencari &ensp; &ensp; &ensp; &ensp; &ensp;: </b>{{$bar2->name}}</label>
                                                <label for="jumlah" class="col-sm-12 control-label"><b>Jumlah &ensp; &ensp; &ensp; &ensp; &ensp;: </b>{{$mohon2->jumlah}}</label>
                                                <label for="kirim" class="col-sm-12 control-label"><b>Jasa Kirim &ensp; &ensp; &ensp; : </b>{{$mohon2->kirim}}</label>
                                                <label for="foto" class="col-sm-12 control-label"><b>Foto Barang &ensp; &ensp;: </b><br><br><center><img src="{{asset('storage/'.$bar->foto)}}" class="showimg"></center></label>
                                            </div>
                                                
                                                <?php
                                                    if ($mohon2->status == "Booking") {?>
                                                        <div class="col-sm-12">
                                                            <ul class="aksi">
                                                                <li>
                                                                    <form method="POST" action="/terimaPermintaan"><br>
                                                                        @csrf
                                                                        <input type="hidden" value="{{$mohon2->id}}" id="id" name="id">
                                                                        <button type="submit" name="submit" class="greenTrans btntran1 raise"><span>Terima</span></button>
                                                                    </form>
                                                                </li>
                                                                <li>
                                                                    <form method="POST" action="/tolakPermintaan">
                                                                        @csrf
                                                                        <input type="hidden" value="{{$mohon2->id}}" id="id" name="id">
                                                                        <button type="submit" name="submit" class="redTrans btntran2 raise"><span>Tolak</span></button>
                                                                    </form>
                                                                </li>
                                                            </ul>
                                                            
                                                        </div>
                                                    <?php }else if ($mohon2->status == "Diterima" && $mohon2->kirim != "Ambil") {?>
                                                        <div class="form-group" style="text-align:left;">
                                                            <center>
                                                                <button class="greenTrans btntran1 raise" data-toggle="modal" data-target="<?php echo "#resi".$cek ?>"><b><span>Nomor Resi</span></b></button>
                                                                <!-- <button class="btn btn-success"><b>Selesai</b></button> -->

                                                                <div class="modal fade bg-dark" id="<?php echo "resi".$cek ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "resi".$cek ?>">
                                                                    <div class="modal-dialog" role="document">
                                                                        <div class="modal-content bgNews">
                                                                            <div class="modal-header">
                                                                                <h4 class="modal-title minta" id="<?php echo "resi".$cek ?>"><b> |--- Kirim Nomor Resi ---|</b> </h4>
                                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                                                                            </div>
                                                                            <div class="modal-body">
                                                                                <form method="post" action="/resi" class="form-horizontal">
                                                                                    @csrf
                                                                                    <div class="form-group">
                                                                                        <label for="nama" class="col-sm-12 control-label" style="color:black;">Masukkan Nomor Resi :</label>
                                                                                        <div class="col-sm-12">
                                                                                            <input type="hidden" class="form-control" value="{{$mohon2->id}}"  name="id" id="id">
                                                                                            <input type="number" class="form-control" value="{{$mohon2->resi}}"  name="resi" id="resi">
                                                                                        </div>
                                                                                        <div class="col-sm-12">
                                                                                            <br><center><button type="submit" name="submit" class="btn btn-primary scanfcode">Kirim</button></center>
                                                                                        </div>
                                                                                    </div>
                                                                                </form>
                                                                            </div>
                                                                            

                                                                        </div>
                                                                    </div>
                                                                </div>

                                                            </center>
                                                        </div>
                                                        
                                                            
                                                        

                                                        
                                                    <?php
                                                    }else{

                                                    }

                                                ?>
                                                
                                        </div>                                          
                                                                                  
                                    </div>
                                </div>
                            </div>
                    <?php 
                            }
                        }else{
                            
                        }

                    ?>
                    
                    


                    @endforeach
                    @if($empty == 0)
                        <tbody>
                            <td colspan="6" class="news">Belum Ada Permintaan</td>
                        </tbody>

                    @endif
                                
                </table></center>
            </div>
            
        </div>
    </div>
</div>




@endsection