@extends('user.sidebar')

@section('riwayatBooking')

@if ($message = Session::get('success'))
<br>
<div class="alert alert-success bg-dark aler2" >
    <p><b>{{ $message }}</b></p>
</div>
@endif

<?php
    use App\Models\user; 
    use App\Models\barang;      
    use Illuminate\Support\Facades\Auth;         
    $cek = 1;       
    $empty = 0;      
?>

<div class="container-fluid">
    <div class="box4">
        <div class="row">
            <div class="col-lg-12">
                <center><h3 class="news"><b>--- Riwayat Booking --- </b></h3>
                <table class="hist2 table table-bordered">
                    <thead class="bgt">
                        <td><b>Nama Barang</b></td>
                        <td><b>Pemilik</b></td>
                        <td><b>Jumlah</b></td>
                        <td><b>Metode Kirim</b></td>
                        <td><b>Status</b></td>
                        <td><b>Aksi</b></td>
                    </thead>

                    @foreach($book as $book2)
                    <?php
                        $cek++;
                        if ($book2->pencari == Auth::user()->email ) {
                            $empty = 1;?>
                            <tbody class="news">
                                <td>{{$book2->namaBarang}}</td>
                                
                                    <?php
                                              
                                        $ok = user::all()->where('email', $book2->pemilik)->first();                            
                                    ?>
                                <td><?php echo $ok->name; ?></td>
                                <td>{{$book2->jumlah}}</td>
                                <td>{{$book2->kirim}}</td>
                                <td>{{$book2->status}}</td>
                                <td><?php

                                        if ($book2->kirim != "Ambil" && $book2->status == "Diterima") {?>
                                            <button class="btn btn-primary scanfcode" data-toggle="modal" data-target="<?php echo "#cek".$cek ?>"><b>Cek Resi</b></button>

                                            <div class="modal fade " id="<?php echo "cek".$cek ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "cek".$cek ?>">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content bgNews">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title minta" id="<?php echo "cek".$cek ?>"><b> |--- Nomor Resi ---|</b> </h4>
                                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                                                        </div>
                                                        <div class="modal-body">
                                                            <?php
                                                                if ($book2->resi == NULL) {?>
                                                                    <div class="form-group">
                                                                        <center><label for="nama" class="col-sm-12 control-label news2"><b>Pemilik Belum Mengirimkan Nomor Resi Anda. </b></label></center>
                                                                    </div>
                                                                <?php
                                                                }else{?>
                                                                    <div class="form-group news2">
                                                                        <center><label for="nama" class="col-sm-12 control-label"><b>Nomor Resi Barang Anda : </b></label>
                                                                        <label for="nama" class="col-sm-12 control-label">{{$book2->resi}}</label></center>
                                                                        <?php
                                                                            if ($book2->kirim == "JNE Express") {?>
                                                                                <a href="https://www.jne.co.id/id/tracking/trace" target="blank"><button class="greenTrans btntran2 raise" ><b><span>Cek Lokasi Paket</span></b></button></a>
                                                                                <?php
                                                                            }else if ($book2->kirim == "J&T Express") {?>
                                                                                <a href="https://jet.co.id/track" target="blank" ><button class="greenTrans btntran2 raise" ><b><span>Cek Lokasi Paket</span></b></button></a>
                                                                                <?php 
                                                                            }
                                                                        ?>
                                                                    </div>
                                                                <?php
                                                                }

                                                            ?>
                                                            
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <?php
                                        }else{
                                            echo "-";
                                        }

                                    ?>
                                    
                                    



                                </td>
                            </tbody>
                    <?php 
                        }else{
                            
                        }

                    ?>
                    @endforeach
                    @if($empty == 0)
                        <tbody>
                            <td colspan="6" class="news">Anda Belum Meminta Barang Apapun</td>
                        </tbody>

                    @endif
                </table></center>
            </div>
            
        </div>
    </div>
</div>




@endsection