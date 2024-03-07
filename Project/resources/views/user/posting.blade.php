@extends('user.sidebar')

@section('posting')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="box9">
                <div class="row">
                    <div class="col-lg-4"></div>
                    <div class="col-lg-4 we news">
                    <form method="POST" action="{{ route('transaksi.store') }}" id="myForm" enctype="multipart/form-data">
                        @csrf
                        <center><h3><b>|--- Posting Barang ---|</b></h3></center><br>
                        Nama Barang : <br>
                        <input id="namaBarang" type="text" class="form-control" name="namaBarang" required="required"><br>
                        
                        Deskripsi : <br>
                        <textarea id="deskripsi" class="form-control" name="deskripsi" required="required"></textarea><br>

                        Jumlah : <br>
                        <input id="jumlah" value="1" min="1" type="number" name="jumlah" class="form-control" placeholder="1" required="required"><br>

                        Daerah : <br>
                        <select name="daerah" class="form-control" id="daerah" required="required">
                            <option value="Blimbing">Blimbing</option>
                            <option value="Kedungkandang">Kedungkandang</option>
                            <option value="Klojen">Klojen</option>
                            <option value="Lowokwaru">Lowokwaru</option>
                            <option value="Sukun">Sukun</option>
                        </select><br>

                        Kategori : <br>
                        <select name="kategori" class="form-control" id="kategori" required="required">
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
                            <option value="Lainnya">Lainnya</option>
                            
                        </select><br>
                        
                        Alamat : <br>
                        <input id="alamat" type="text" class="form-control" name="alamat" required="required"><br>

                        Foto : <br>
                        <input type="file" name="foto" class="form-control" required="required" id="foto" accept="image/*">

                        

                        <button type="submit" class="btn btn-primary sub scanfcode">Kirim</button>
                        </form>
                    </div>
                    <div class="col-lg-4"></div>
                </div>
                    
            </div>
        </div>
        
    </div>
</div>

@endsection
