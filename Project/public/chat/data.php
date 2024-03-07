<?php

    use App\Models\user; 
    use App\Models\barang;      
    use Illuminate\Support\Facades\Auth;     
    

    $connect = mysqli_connect('localhost', 'root', '', 'shareweb');
	
	if(mysqli_connect_error()){
		echo 'Gagal melakukan koneksi ke Database : '.mysqli_connect_error();
	}else{
	
	}

    session_start();
    $key1 = $_SESSION['us1'].$_SESSION['us2'];
    $key2 = $_SESSION['us2'].$_SESSION['us1'];


    $query=mysqli_query($connect, "SELECT * FROM dbpesan");
    while($row = mysqli_fetch_assoc($query)) {
        $data[] = $row;
    }
                
    $json = json_encode($data);
    $dec = json_decode($json);
    $count = count($dec);
    $cek = 0;

    // Tanggal
    $dat[] = [];
    $beda = 0;
    $j1 = 0;
    $j2 = 0;
    $hitung = 1;
    $dasar = 0;

    for ($a=0; $a < $count ; $a++) { 

        if ($dec[$a]->key == $key1 || $dec[$a]->key == $key2) {
            

            if ($dasar == 0) {
                $dat[$hitung] = $dec[$a]->tanggal;

                if ($dec[$a]->tanggal == date('Y/m/d')) {
                    echo "<center><br><b> << -- HARI INI -- >></b><br><br></center>";
                }else if ($dec[$a]->tanggal == date('Y/m/d', strtotime("-1 day", strtotime(date("Y/m/d"))))) {
                    echo "<center><br><b> << -- KEMARIN -- >></b><br><br></center>";
                }else{
                    echo "<center><br><b> << -- " . $dat[$hitung] . " -- >> </b><br><br></center>";
                }


                $hitung++;
                $dasar++;
            }else{
                $beda = 0;
                for ($c=1; $c < $hitung; $c++) { 
                    if ($dec[$a]->tanggal == $dat[$c]) {
                        $beda = 1;
                    }
                }


                if ($beda == 1) {
                    // echo "sama";
                }else if ($beda == 0) {
                    $dat[$hitung] = $dec[$a]->tanggal;
                    // echo $dec[$a]->tanggal;
                    $hitung++;

                    if ($dec[$a]->tanggal == date('Y/m/d')) {
                        echo "<center><br><b> << -- HARI INI -- >></b><br><br></center>";
                    }else if ($dec[$a]->tanggal == date('Y/m/d', strtotime("-1 day", strtotime(date("Y/m/d"))))) {
                        echo "<center><br><b> << -- KEMARIN -- >></b><br><br></center>";
                    }else{
                        echo "<center><br><b> << -- " . $dat[$hitung-1] . " -- >> </b><br><br></center>";
                    }

                }

            }

        }
        

        echo "<div class='container-fluid jos'>";
        if ($dec[$a]->key == $key1) {
            

            
                echo "<div class='row'>";
                    echo "<div class='col-lg-6'></div>";
                    echo "<div class='col-lg-6 pull-right'>";
                        echo "<div class='ok sip'>" . $dec[$a]->pesan;
                            echo "<br><div class='waktu'>";
                                echo date('h:i a',strtotime($dec[$a]->waktu));
                        echo "</div></div>";
                    echo "</div>";
                echo "</div>";
            
             
        }else if ($dec[$a]->key == $key2) {
                echo "<div class='row'>";
                    
                    echo "<div class='col-lg-6 pull-left'>";
                        echo "<div class='ok2 sip2'>" . $dec[$a]->pesan;
                            echo "<br><div class='waktu'>";
                                echo date('h:i a',strtotime($dec[$a]->waktu));
                            echo "</div>";
                        echo "</div>";
                        echo "<div class='col-lg-6'></div>";
                    echo "</div>";

                echo "</div>";
            
            
        }
        
        echo "</div>";
        
    }
        
    
?>

<style>

.waktu{
    font-size: 12px;
    font-weight: bold;
    color: #333;
    text-align:right;
    
    
    text-transform: uppercase;
}

.position{
    width:100%;
}
        

.ok{
    text-align:right;
}

.sip{
    color:white;
    margin-left:auto;
    margin-right: 5px;
    max-width: max-content;
    background: rgb(110, 107, 107);
    padding: 7px 10px 7px 10px;
    border-radius: 10px;
    
}

.ok2{
    text-align:left;
}

.sip2{
    color:white;
    margin-left:5px;
    margin-right: auto;
    margin-right: 5px;
    max-width: max-content;
    background: rgb(105, 105, 105);
    padding: 7px 10px 7px 10px;
    border-radius: 10px;
}

@media(max-width: 1080px) {
    .sip2 {
        width:55%;
    }
    .sip {
        width:55%;
    }
}

.jos{
    
    margin-bottom: 10px;
}

</style>