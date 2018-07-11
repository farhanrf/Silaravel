<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Goodsin;
use App\Goodsout;
use App\Category;
use App\Stock;
use App\Alldevice;


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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $barangMasuk = Goodsin::all();
        $barangKeluar = Goodsout::all();
        $categories = Category::all();
        $dataBarang = Stock::all();
        $semuaBarang = Alldevice::all();

        
        return view('dashboard.dashboard',
        compact(['barangMasuk', 'barangKeluar', 'categories' , 'stock' , 'alldevice']));
    }
}
