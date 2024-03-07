<div class="box5">
    <br>
        <center><h3><b>| ---Pesan--- |</b></h3></center>

        <?php        
            use App\Models\user;

            $cek = 0;
            $cek2 = 0;
            $cek3 = 0;
            $sname[] = [];

            $cek4 = 0;
            $cek5 = 0;
            $cek6 = 0;
            $sname2[] = [];
        ?>

        @foreach($pesan as $pes)

            <?php
                if ($pes->user1 == Auth::user()->email) {
                            
                    if ($cek3 == 0) {
                        $sname[0] = $pes->user2;
                        $cek3 = 1;
                    }

                    for ($i=0; $i < $cek; $i++) { 
                        if ($pes->user2 == $sname[$i]) {
                             $cek2 = 1;
                        }
                    }     

                    if ($cek2 == 1) {
                                
                    }else{
                        $sname[$cek] = $pes->user2;
                        $member = user::all()->where('email', $pes->user2)->first();
                        ?>
                            <a href="{{ route ('admin.edit', $member->email) }}">
                            <?php
                        if ($member->email == $members->email) {?>
                                <div class="box8"><?php
                        }else{?>
                                <div class="box6"><?php
                        }
                        ?>
                                    {{$member->name}}<br>
                                    {{$member->tlp}}
                                </div>
                            </a>
                                    

                                <?php
                                $cek++;
                        }

                        $cek2 = 0;
                    }
                ?>

                <?php
                    if ($pes->user2 == Auth::user()->email) {
                            
                    for ($b=0; $b < $cek ; $b++) { 
                        if ($pes->user1 == $sname[$b]) {
                            $cek6 = 1;
                            $cek5 = 1;
                        }
                    }

                    if ($cek6 == 0) {
                        $sname2[0] = $pes->user1;
                        $cek6 = 1;
                    }

                    for ($c=0; $c < $cek4; $c++) { 
                        if ($pes->user1 == $sname2[$c]) {
                            $cek5 = 1;
                        }
                    }     

                    if ($cek5 == 1) {
                                
                    }else{
                        $sname2[$cek4] = $pes->user1;
                        $member2 = user::all()->where('email', $pes->user1)->first();
                        ?>
                        <a href="{{ route ('admin.edit', $member2->email) }}">
                            <?php
                        if ($member2->email == $members->email) {?>
                            <div class="box8"><?php
                        }else{?>
                            <div class="box6"><?php
                        }
                        ?>
                                    {{$member2->name}}<br>
                                    {{$member2->tlp}}
                            </div>
                        </a>
                                    

                        <?php
                        $cek4++;
                    }

                    $cek5 = 0;
                }
            ?>
                
                
        @endforeach
                
</div>