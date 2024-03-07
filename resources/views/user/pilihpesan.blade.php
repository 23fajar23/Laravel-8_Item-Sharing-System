@extends('user.sidebar')

@section('pilihpesan')
<?php
    use App\Models\user; 
    use App\Models\barang;      
    use Illuminate\Support\Facades\Auth;
    session_start();
    $_SESSION['us1'] = $priU->email;
    $_SESSION['us2'] = Auth::user()->email;
    
    $zero = 0;
    $cek = 0;   
    $smail[] = [];
?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-3">
            <div class="box5 news">
                <center><h3><b>| ---Kontak--- |</b></h3></center>
                @foreach($pesan as $pes)
                    <?php
                        if ($pes->user1 != Auth::user()->email && $pes->user2 == Auth::user()->email) {
                            if ($zero == 0) {
                                $smail[$zero] = $pes->user1;
                                $zero++;
                            }
                            if ($zero > 0) {
                                $sama = 0;
                                for ($i=0; $i < $zero ; $i++) { 
                                    if ($pes->user1 == $smail[$i]) {
                                        $sama = 1;
                                    }else{}
                                }
                                if ($sama == 0) {
                                    $smail[$zero] = $pes->user1;
                                    $zero++;
                                }
                            }
                        }

                        if ($pes->user1 == Auth::user()->email && $pes->user2 != Auth::user()->email) {
                            if ($zero == 0) {
                                $smail[$zero] = $pes->user2;
                                $zero++;
                            }else if ($zero > 0) {
                                $sama2 = 0;
                                for ($a=0; $a < $zero ; $a++) { 
                                    if ($pes->user2 == $smail[$a]) {
                                        $sama2 = 1;
                                    }else{}
                                }
                                if ($sama2 == 0) {
                                    $smail[$zero] = $pes->user2;
                                    $zero++;
                                }
                            }                            
                        }                    
                    ?>
                @endforeach
                
                <?php
                    for ($b=0; $b < $zero; $b++) { 
                        $ur = user::all()->where('email', $smail[$b])->first();
                        ?>
                            <a href="{{route('pesanC.show', $ur->email)}}">
                            <div class="box6">                           
                                <b>{{$ur->name}}</b><br>
                                ({{$ur->tlp}})
                            </div></a>
                        <?php
                    }
                ?>       
            </div>
        </div>
        <div class="col-lg-9">
            <div class="boxMessage">
                
                <div class="boxhead"><center>
                    <b>{{$priU->name}}</b>
                </div></center>

                <center><br>
                <div class="boxContent" id="boxContent">

                </div></center><br>

                <form id="form-input">
                    <input type="hidden" value="{{$priU->email}}" id="user1" name="user1">
                    <input type="hidden" value="{{Auth::user()->email}}" id="user2" name="user2">
                    <div class="row">
                        <div class="col-lg-2"></div>
                        <div class="col-lg-7">
                            <input type="text" class="form-control raiseTable3" id="pesan" name="pesan" placeholder="Tulis Pesan Anda">                           
                        </div>
                        <div class="col-lg-1 textMid">
                            <button type="submit" id="tombol-simpan" class="greenTransDark btntrandark raisedark "><b><span>Kirim</span></b></button><br><br>
                        </div>
                        <div class="col-lg-2"></div>                      
                    </div>               
                </form>
            </div>
        </div>
    </div>
</div>
<script src="{{asset('chat/jquery-3.5.1.js')}}" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="{{asset('chat/jquery.validate.js')}}"></script>

    <script>
        $(document).ready(function () {
            selesai();
        });

        function selesai() {
            setTimeout(function() {
                update();
                selesai();
            }, 500);
        }

        $("#tombol-simpan").click(function () {
            //validasi form
            $('#form-input').validate({
                rules: {
                    pesan: {
                        required: true
                    }
                },
                //jika validasi sukses maka lakukan
                submitHandler: function (form) {
                    $.ajax({
                        type: 'POST',
                        url: "{{asset('chat/simpan.php')}}",
                        data: $('#form-input').serialize(),
                        success: function () {
                            //setelah simpan data, update data terbaru
                            update()
                        }
                    });
                    //kosongkan form nama dan jurusan
                    document.getElementById("pesan").value = "";
                    return false;
                }
            });
        });

        //fungsi tampil data
        function update() {
            $.ajax({
                url: '{{asset('chat/data.php')}}',
                type: 'GET',
                success: function(data) {
                    $('#boxContent').load("/chat/data.php");
                    
                }
                
            });
            
        }
    </script>

@endsection