@extends('user.sidebar')

@section('pesan')
<?php
    use App\Models\user; 
    use App\Models\barang;      
    use Illuminate\Support\Facades\Auth;      
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
            <div class="box2 news">
                <center><h3>Tidak Ada Tampilan<h3><center>
            </div>
        </div>
    </div>
</div>


@endsection