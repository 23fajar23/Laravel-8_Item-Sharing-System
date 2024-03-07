<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\barang;

use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::user()->lvl == "2") {
            $barang = barang::all();
            return view('admin/home', ['barang' => $barang]);

        }else if (Auth::user()->lvl == "1") {
            $barang = barang::all()->where('status', NULL);
            return view('user/home', ['barang' => $barang]);
        }

    }
}
