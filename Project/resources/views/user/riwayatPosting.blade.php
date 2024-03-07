@extends('user.sidebar')

@section('riwayatPosting')
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
                <center><h3><b>--- Riwayat Posting --- </b></h3>
                <table class="hist table table-bordered">
                    <thead class="bgt">
                        
                        <td><b>Nama Barang</b></td>
                        <td><b>Kategori</b></td>
                        <td><b>Tersedia</b></td>
                        <td><b>Booking</b></td>
                        <td width="190px"><b>Aksi</b></td>
                    </thead>
                    <?php
                        use App\Models\minta;
                        $empty = 0;
                    ?>
                    @foreach($data as $data2)
                    <tbody class="news">
                            <form id="find" action="/ubah" method="POST">
                            @csrf
                            <input type="hidden" value="{{$data2->id}}" id="id" name="id">
                        
                        <td>{{$data2->namaBarang}}</td>
                        <td>{{$data2->kategori}}</td>
                        <?php
                            $empty = 1;
                            $total = 0;
                            $cek = minta::all()->where('status', "Booking")->where('idBarang', $data2->id); 
                            foreach ($cek as $cek2) {
                                $total = $total + $cek2->jumlah;
                            }
                            
                        ?>
                        <td>{{$data2->stock}}</td>
                        <td><?php echo $total ?></td>
                        <td>
                            <div class="row">
                                <div class="col-lg-6"><button type="submit" class="blueTransDark btntrandark raisedark"><span>Ubah</span></button></form> </div>
                                <div class="col-lg-6">
                                    <form action="{{ route('transaksi.destroy',$data2->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="redTransDark btntrandark raisedark"><span>Hapus</span></button>
                                    </form>

                                </div>
                            </div>
                            
                            
                            
                        </td>
                    </tbody>
                    @endforeach
                    @if($empty == 0)
                        <tbody>
                            <td colspan="5" class="news">Tidak Ada Postingan</td>
                                    
                        </tbody>

                    @endif
                </table></center>

            </div>
            
        </div>
    </div>
</div>


@endsection