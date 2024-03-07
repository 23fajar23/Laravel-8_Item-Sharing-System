@extends('user.sidebar')

@section("ubahPost")
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box4 news">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 we">
                    <form method="POST" action="/update" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <center><h3><b>|--- Ubah Posting ---|</b></h3></center><br>
                        Nama Barang : <br>
                        <input id="namaBarang" type="text" class="form-control" name="namaBarang" required="required" value="{{$data->namaBarang}}"><br>
                        
                        Deskripsi : <br>
                        <textarea id="deskripsi" class="form-control" name="deskripsi" required="required">{{$data->deskripsiLengkap}}</textarea><br>

                        <?php
                            use App\Models\minta;
                            $total = 0;
                            $cek = minta::all()->where('status', "Booking")->where('idBarang', $data->id); 
                            foreach ($cek as $cek2) {
                                $total = $total + $cek2->jumlah;
                            }
                            
                        ?>

                        Stock : <br>
                        <input id="jumlah" min="{{$total}}" type="number" name="jumlah" class="form-control" required="required" value="{{$data->stock}}"><br>

                        Daerah : <br>
                        <select name="daerah" class="form-control" id="daerah" required="required">
                            <option value="{{$data->daerah}}" hidden>-- {{$data->daerah}} -- </option>
                            <option value="Blimbing">Blimbing</option>
                            <option value="Kedungkandang">Kedungkandang</option>
                            <option value="Klojen">Klojen</option>
                            <option value="Lowokwaru">Lowokwaru</option>
                            <option value="Sukun">Sukun</option>
                        </select><br>

                        Kategori : <br>
                        <select name="kategori" class="form-control" id="kategori" required="required" >
                            <option value="{{$data->kategori}}" hidden>-- {{$data->kategori}} --</option>
                            <option value="Elektronik">Elektronik</option>
                            <option value="Perabotan Rumah">Perabotan Rumah</option>
                            <option value="Aksesoris">Aksesoris</option>
                            <option value="Part Kendaraan">Part Kendaraan</option>
                            <option value="Pakaian">Pakaian</option>
                            <option value="Buku">Buku</option>
                            <option value="Perlengkapan Sekolah">Perlengkapan Sekolah</option>
                            <option value="Mainan Anak">Mainan Anak</option>
                            <option value="Bahan Bangunan">Bahan Bangunan</option>
                            <option value="Alat Bangunan">Alat Bangunan</option>
                            
                        </select><br>
                        
                        Alamat : <br>
                        <input id="alamat" type="text" class="form-control" name="alamat" required="required" value="{{$data->alamat}}"><br>

                        Foto : <br>
                        <input type="file" name="foto" class="form-control" id="foto" accept="image/*">

                        
                        <input id="id" type="hidden"name="id" required="required" value="{{$data->id}}">
                        <button type="submit" class="btn btn-info sub scanfcode">Ubah</button>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                    
            </div>
        </div>
        
    </div>
</div>

@endsection