@extends('user.sidebar')

@section('pilih')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="box1">
                <div class="row">                    
                    <div class="col-lg-1"></div>
                    <div class="col-lg-8 news">
                    <h2><b>-> Kategori</b></h2>
                         @include('user.leftmenu') 
                    </div>
                    <div class="col-lg-3"></div>
                </div>
                

                <br>
                
            </div>
        </div>
        <div class="col-lg-9">
            <div class="box2">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-8 text-white"><br>
                            <center><img src="{{asset('storage/'.$data2->foto)}}" class="si"><br><br><h4><b>--- {{$data2->namaBarang}} ---</b></h4></center>
                            <br><br>
                            <h2><b>Deskripsi : </b></h2>
                            {{$data2->deskripsiLengkap}}<br><br>

                            <h2><b>Kategori : </b></h2>
                            {{$data2->kategori}}<br><br>

                            <h2><b>Lokasi : </b></h2>
                            Daerah : {{$data2->daerah}}<br>
                            Alamat : {{$data2->alamat}}<br><br>
                            
                            <h2><b>Pemilik : </b></h2>
                            {{$datuser->name}}<br><br>

                            <table class="table">
                                <tr>
                                    <td>
                                        <?php 
                                            if ($data2->stock > 0) {?>
                                                <center><button class="greenTrans btntran1 raise" data-toggle="modal" data-target="#mySelect"><b><span>Minta</span></b></button></center><br>
                                                <?php
                                            }else if ($data2->stock == 0) {?>
                                                <center><button class="greenTrans btntran1 raise" disabled><b><span>Minta</span></b></button></center><br>
                                                <?php
                                            }
                                        ?>

                                        
                                    </td>
                                    <td>
                                        <center><button class="redTrans btntran2 raise" data-toggle="modal" data-target="#myModal"><b><span>Laporkan</span></b></button></center><br>                                       
                                    </td>
                                </tr>
                        
                            </table>
                            <br><br>
                        </div>
                        <div class="col-lg-2"></div>
                    </div>
                </div>


            </div>
        </div>
    </div>
</div>



<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title lapor" id="myModalLabel"><b> |--- Laporkan ---|</b> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
            </div>
            <div class="modal-body">
                <form method="post" action="/lapor" class="form-horizontal">
                @csrf
                <div class="form-group">
                    <label for="nama" class="col-sm-12 control-label">Ada apa dengan postingan ini ?</label>
                    <div class="col-sm-12">
                        <input type="hidden" value="{{$data2->id}}" name="idb" id="idb">
                        <textarea placeholder="Isikan Pelanggaran Postingan Ini" class="form-control" name="komentar" id="komentar" required="required"></textarea>
                    </div>
                    <div class="col-sm-12">
                        <br><center><button type="submit" name="submit" class="redTrans btntran2 raise"><span>Laporkan</span></button></center>
                    </div>
                </div>
            </div>
            

            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="mySelect" tabindex="-1" role="dialog" aria-labelledby="mySelectLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title minta" id="mySelectLabel"><b> |--- Minta Barang ---|</b> </h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
            </div>
            <div class="modal-body">
                <form method="post" action="{{route('transaksi.update', $data2->id)}}" class="form-horizontal">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="nama" class="col-sm-12 control-label">Masukkan Jumlah Barang :</label>
                        <div class="col-sm-12">
                            <input type="number" class="form-control" value="1" min="1" max="{{$data2->stock}}" name="jml" id="jml">
                        </div><br>
                        <label for="kirim" class="col-sm-12 control-label">Metode Pengiriman :</label>
                        <div class="col-sm-12">
                        <select name="kirim" class="form-control" id="kirim" required="required" >
                            <option value="Ambil">Ambil</option>
                            <option value="JNE Express">JNE Express</option>
                            <option value="J&T Express">J&T Express</option>
                        </select><br>    


                        </div>
                        <div class="col-sm-12">
                            <br><center><button type="submit" name="submit" class="greenTrans btntran1 raise"><span>Minta</span></button></center>
                        </div>
                    </div>
                </form>
            </div>
            

        </div>
    </div>
</div>


@endsection