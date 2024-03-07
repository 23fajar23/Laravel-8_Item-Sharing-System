<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\minta;
use App\Models\pesan;
use App\Models\laporan;
use App\Models\user;
use Illuminate\Support\Facades\Auth;

class transaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.posting');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = new barang;
        $data->namaBarang = request('namaBarang');
        $data->pemilik = Auth::user()->email;
        $data->jumlah = request('jumlah');
        $data->deskripsiLengkap = request('deskripsi');
        $data->daerah = request('daerah');
        $data->kategori = request('kategori');
        $data->alamat = request('alamat');
        $data->stock = request('jumlah');

        $file = $request->file('foto')->store('upload','public');
        $data->foto = $file;
        $data->save();

        return redirect()->route('posting')
            ->with('success', '* Postingan Baru Telah Ditambahkan *');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data2 = barang::all()->where('id', $id)->first();
        $datuser = User::all()->where('email', $data2->pemilik)->first();
        return view('user.pilihbarang', compact('data2','datuser'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($kategori)
    {
        $data = barang::all();
        $barang = barang::where('kategori', $kategori)->paginate(0);
        
        return view('user.home', compact('data','barang'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $dat = barang::all()->where('id', $id)->first();
        $user = user::all()->where('email', $dat->pemilik)->first();
        
        $minta = new minta;
        $minta->idBarang = $id;
        $minta->namaBarang = $dat->namaBarang;
        $minta->pemilik = $dat->pemilik;
        $minta->pencari = Auth::user()->email;
        $minta->daerah = $dat->daerah;
        $minta->namaPemilik = $user->name;
        $minta->jumlah = request('jml');
        $minta->waktu = date_create();
        $minta->kirim = request('kirim');
        $minta->status = "Booking";
        $minta->save();

        $dat->stock = $dat->stock - request('jml');  
        $dat->save();
        
        $pesan = new pesan;
        $pesan->pesan = "Hallo, apakah " . $dat->namaBarang . " ini masih tersedia ?";
        $pesan->user1 = $dat->pemilik;
        $pesan->user2 = Auth::user()->email;
        $pesan->tanggal = date("Y/m/d");
        $pesan->waktu = date("h:i:sa");
        $pesan->key = $dat->pemilik . Auth::user()->email;
        $pesan->save();

        // $dat->status = "minta";
        // $dat->save();

        return redirect()->route('riwayatBooking')
            ->with('success', '* 2 hari Tanpa Konfirmasi Permintaan Akan Dihapus *');

        // return redirect()->route('posting')
        //     ->with('success', '* Postingan Baru Telah Ditambahkan *');
        
        
        // $awal  = date_create('2021-11-02');
        // $akhir = date_create(); // waktu sekarang
        // $diff  = date_diff( $awal, $akhir );
        
        // return "asd";

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
               
        // $delMin = minta::all()->where('idBarang', $id);
        
        // foreach ($delMin as $hap) {
        //     $tes = minta::all()->where('id', $hap->id)->first();
        //     $tes->delete();
        // }

        $del = barang::all()->where('id', $id)->first();
        $del->status = "-";
        $del->save();

        return redirect()->route('posting');
    }

    public function search(Request $request){
        $data = barang::all()->where('status', NULL);
        $barang = barang::when($request->keyword, function ($query) use ($request){
            $query->where('namaBarang', 'LIKE', "%{$request->keyword}%");
        })->paginate(0);
        
        return view('user.home', compact('data','barang'));
    }
    
    public function select(Request $request){
        $data = barang::all();
        $barang = barang::when($request->keyword, function ($query) use ($request){
            $query->where('namaBarang', 'LIKE', "%{$request->keyword}%");
        })->paginate(0);
        
        return view('user.home', compact('data','barang'));
    }


    public function ubah(Request $request){
        $bar = barang::all()->where('id',$request->id)->first();
        return view('user.ubahposting', ['data' => $bar]);
    }

    public function upd(Request $request){
        

        $up = barang::all()->where('id', $request->id)->first();
        $up->namaBarang = request('namaBarang');
        $up->deskripsiLengkap = request('deskripsi');
        $up->daerah = request('daerah');
        $up->stock = request('jumlah');
        $up->kategori = request('kategori');
        $up->alamat = request('alamat');
        
        if (request('foto') == NULL) {
            
        }else{
            $file = $request->file('foto')->store('upload','public');
            $up->foto = $file;
        }

        $up->save();
        return redirect()->route('posting');
    }

    public function lapor(Request $request){

        $barang = barang::all()->where('id',$request->idb)->first();

        $lap = new laporan;
        $lap->namaBarang = $barang->namaBarang;
        $lap->pemilik = $barang->pemilik;
        $lap->foto = $barang->foto;
        $lap->alamat = $barang->alamat;
        $lap->komentar = request('komentar');
        $lap->save();

        return redirect()->route('home');
    }

    public function pesan(){
        $pesan = pesan::all();
        return view('user.pesan', ['pesan' => $pesan]);
    }

    public function posting(){
        $barang = barang::all()->where('pemilik',Auth::user()->email)->where('status', NULL);

        return view('user.riwayatPosting', ['data' => $barang]);
    }

    public function permintaan(){
        $mohon = minta::all();

        return view('user.riwayatPermintaan',['mohon' => $mohon]);
    }

    public function terimaPermintaan(Request $request){
        $terima = minta::all()->where('id', request('id'))->first();
        $terima->status = "Diterima";
        $terima->save();
        return redirect()->route('permintaan');
    }

    public function tolakPermintaan(Request $request){
        $terima = minta::all()->where('id', request('id'))->first();
        $terima->status = "Ditolak";
        $terima->save();

        $tambahStock = barang::all()->where('id', $terima->idBarang)->first();
        $tambahStock->stock = $tambahStock->stock + $terima->jumlah;
        $tambahStock->save();

        return redirect()->route('permintaan');
    }

    public function riwayatBooking(){
        $book = minta::all();
        return view('user.riwayatBooking',['book' => $book]);
    }

    public function resi(Request $request){
        $resi = minta::all()->where('id', request('id'))->first();
        $resi->resi = request('resi');
        $resi->save();


        return redirect()->route('permintaan')
            ->with('success', '* Nomor Resi Berhasil Diubah *');
    }

    public function profil(){
        $akun = user::all()->where('email', Auth::user()->email)->first();
        return view('user.profil',['akun' => $akun]);
    }

    public function profilUpdate(Request $request){
        $updateProfil = user::all()->where('email', Auth::user()->email)->first();
        $updateProfil->name = request('name');
        $updateProfil->tlp = request('tlp');
        $updateProfil->alamat = request('alamat');

        if (request('foto') == NULL) {
            
        }else{
            $file = $request->file('foto')->store('upload','public');
            $updateProfil->foto = $file;
        }

        $updateProfil->save();
        return redirect()->route('profil');





    }



}
