@extends('admin.sidebar')

@section('home')

@if ($message = Session::get('success'))
<br>
<div class="alert alert-success bg-dark aler" >
    <center><p><b>{{ $message }}</b></p></center>
</div>
@endif
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
                        <center><h3 class="news"><b>| --- Daftar Postingan --- |</b></h3>
                        <table class="hist table table-bordered">
                            <thead class="bgt">
                                
                                <td><b>Nama Barang</b></td>
                                <td><b>Pemilik</b></td>
                                <td><b>Deskripsi</b></td>
                                <td><b>Lokasi</b></td>
                                <td width="30px"><b>Aksi</b></td>
                                
                            </thead>
                            @foreach($barang as $bar)
                            <?php
                                $empty = 1;
                            ?>
                            <tbody class="news">
                                <td>{{$bar->namaBarang}}</td>
                                <td>
                                    <?php
                                        $name = user::all()->where('email', $bar->pemilik)->first();
                                        echo $name->name;
                                    ?>


                                </td>
                                <td>{{$bar->deskripsiLengkap}}</td>
                                <td>{{$bar->daerah}}</td>
                                <td>
                                    <button class="btn btn-primary scanfcode" data-toggle="modal" data-target="<?php echo "#adminPosting".$bar->id ?>"><b>Rincian</b></button>
                                </td>
                            </tbody>

                            <div class="modal fade" id="<?php echo "adminPosting".$bar->id ?>" tabindex="-1" role="dialog" aria-labelledby="<?php echo "adminPosting".$bar->id ?>">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content bgNews">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="<?php echo "adminPosting".$bar->id ?>" style="color:blue;"><b> |--- Rincian Barang ---|</b> </h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                                        </div>
                                        <div class="modal-body">
                                            <div class="form-group" style="text-align:left;">
                                                
                                                <label for="namaBarang" class="col-sm-12 control-label"><b>Nama Barang &ensp; : </b>{{$bar->namaBarang}}</label>
                                                <label for="kategori" class="col-sm-12 control-label"><b>Kategori &ensp; &ensp; &ensp; &ensp; : </b>{{$bar->kategori}}</label>
                                                <label for="pemilik" class="col-sm-12 control-label"><b>Pemilik &ensp; &ensp; &ensp; &ensp; &ensp;: </b>{{$name->name}}</label>
                                                <label for="daerah" class="col-sm-12 control-label"><b>Daerah &ensp; &ensp; &ensp; &ensp; &ensp;: </b>{{$bar->daerah}}</label>
                                                <label for="alamat" class="col-sm-12 control-label"><b>Alamat &ensp; &ensp; &ensp; &ensp; &ensp;: </b>{{$bar->alamat}}</label>
                                                <label for="deskripsi" class="col-sm-12 control-label"><b>Deskripsi&ensp; &ensp; &emsp; : </b>{{$bar->deskripsiLengkap}}</label>
                                                <label for="foto" class="col-sm-12 control-label"><b>Foto Barang &ensp; &ensp;: </b><br><br><center><img src="{{asset('storage/'.$bar->foto)}}" class="showimg"></center></label>
                                            </div>
                                            <div class="form-group">
                                                <form action="{{ route('admin.destroy',$bar->id) }}" method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <?php 
                                                        if ($bar->status != NULL) {?>
                                                            <button type="submit" class="redTrans btntran2 raise" disabled><span>Dihapus</span></button>
                                                        <?php } else {?>
                                                            <button type="submit" class="redTrans btntran2 raise"><span>Hapus</span></button>
                                                            
                                                        <?php
                                                        }
                                                    ?>
                                                    
                                                </form>

                                            </div>    
                                        </div>                                          
                                                                                  
                                    </div>
                                </div>
                            </div>
                    




                            @endforeach
                            @if($empty == 0)
                                <tbody>
                                    <td colspan="5">Barang Tidak Ditemukan</td>
                                    
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