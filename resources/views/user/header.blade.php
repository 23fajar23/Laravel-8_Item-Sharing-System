<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Poppins:300,400,500&display=swap" rel="stylesheet">

        <link href="https://fonts.googleapis.com/css?family=Source+Serif+Pro:400,600&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="{{asset('asset/sidebar/fonts/icomoon/style.css')}}">

        <link rel="stylesheet" href="{{asset('asset/sidebar/css/owl.carousel.min.css')}}">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="{{asset('asset/sidebar/css/bootstrap.min.css')}}">
        
        <!-- Style -->
        <link rel="stylesheet" href="{{asset('asset/sidebar/css/style.css')}}">
        <link rel="stylesheet" href="{{asset('css/styleUser.css')}}">
        <link rel='stylesheet' href="{{asset('asset/chat/css/animate.min.css')}}">

        <script src="{{asset('asset/sidebar/js/jquery-3.3.1.min.js')}}"></script>
        <script src="{{asset('asset/sidebar/js/popper.min.js')}}"></script>
        <script src="{{asset('asset/sidebar/js/bootstrap.min.js')}}"></script>
        <script src="{{asset('asset/sidebar/js/main.js')}}"></script>

        <?php 
            use App\Models\minta;
            use App\Models\barang;

            $cek = minta::all();
            foreach ($cek as $cek2 ) {
                if ($cek2->status == "Booking") {
                    $awal  = date_create($cek2->waktu);
                    $akhir = date_create(); // waktu sekarang
                    $diff  = date_diff( $awal, $akhir );
                    if ($diff->d >= 2) {
                        $delete = minta::all()->where('id', $cek2->id)->first();
                        $back = barang::all()->where('id', $cek2->idBarang)->first();
                        $back->stock = $back->stock + $cek2->jumlah;
                        $back->save();
                        $delete->delete();
                    }
                }

            }
            ?>

    </head>
<html>