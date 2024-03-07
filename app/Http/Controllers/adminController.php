<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;
use App\Models\laporan;
use App\Models\user;
use App\Models\minta;
use App\Models\pesan;

class adminController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($email)
    {
        $members = user::all()->where('email', $email)->first();
        $pesan = pesan::all();
        return view('user/pilihpesan', compact('members', 'pesan'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // $delMin2 = minta::all()->where('idBarang', $id);
        
        // foreach ($delMin2 as $hap) {
        //     $tes = minta::all()->where('id', $hap->id)->first();
        //     $tes->delete();
        // }
        $barang2 = barang::all()->where('id', $id)->first();
        $barang2->status = "-";
        $barang2->save();
        return redirect()->route('home')
            ->with('success', '* Postingan Telah Dihapus *');
    }

    public function laporan(){
        $laporan = laporan::all();
        return view('admin/laporan',['laporan' => $laporan]);
    }

    public function search(Request $request){
        $data = barang::all();
        $barang = barang::when($request->keyword, function ($query) use ($request){
            $query->where('namaBarang', 'LIKE', "%{$request->keyword}%");
        })->paginate(0);
        
        return view('admin.home', compact('data','barang'));
    }

}
