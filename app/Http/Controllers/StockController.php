<?php

namespace App\Http\Controllers;

use App\Stock;
use App\Device;
use App\Location;
use App\Category;
use Illuminate\Http\Request;
use Response;

class StockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function  importExport(){ 
    return view('databarang.excel');
}
public function exportExcel(){ 
    $dataBarang =  Stock::select('nama_barang','id_barang','lokasi_barang','id_kategori')->get(); 
    return Excel::create('databarang',  function($excel) use($barang){
          $excel->sheet('mysheet',  function($sheet) use($barang){
          $sheet->fromArray($dataBarang);
          });
    })->download('xls');
}
 
public function importExcel(Request $request) {
    if($request->hasFile('file')){
        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path, function($reader){})->get();
        if(!empty($data) && $data->count()){
            foreach($data as $key=>$val){
               $dataBarang = new Stock;
               $dataBarang->name = $request->name;
               $dataBarang->device_id = $request->device_id;
               $dataBarang->date = $request->date;
               $dataBarang->location_id = $request->location_id;
               $dataBarang->users_id = $request->users_id;
               $dataBarang->category_id = $request->category_id;
           }
        }
   }
  return back();
}

    public function index()
    {
        $dataBarang = Stock::all();
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.databarang.index',
        compact('dataBarang', 'devices', 'locations', 'categories'));
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
        $dataBarang = new Stock();
        $dataBarang->name = $request->name;
        $dataBarang->device_id = $request->device_id;
        $dataBarang->date = $request->date;
        $dataBarang->location_id = $request->location_id;
        $dataBarang->users_id = $request->users_id;
        $dataBarang->category_id = $request->category_id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function show(Stock $stock)
    {
        $dataBarang = Stock::find($id);
        $devices = Device::all();
        $locations = Location::all();
        $categories = Category::all();
        return view('dashboard.dataBarang.edit',
        compact(['dataBarang', 'devices', 'locations', 'categories']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function edit(Stock $stock)
    {
        $dataBarang = Stock::find($id);
        $dataBarang->name = $request->name;
        $dataBarang->device_id = $request->device_id;
        $dataBarang->date = $request->date;
        $dataBarang->location_id = $request->location_id;
        $dataBarang->users_id = $request->users_id;
        $dataBarang->category_id = $request->category_id;
        $dataBarang->save();
          return redirect()->route('databarang.index')->with('success','Berhasil diperbaharui');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Stock $stock)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Stock  $stock
     * @return \Illuminate\Http\Response
     */
    public function destroy(Stock $stock)
    {
        $dataBarang = Stock::find($id);
        if (!$dataBarang) return $this->response->errorNotFound('Barang tidak tersedia');
        $dataBarang->delete();
          return redirect()->route('databarang.index')->with('success','Barang berhasil dihapus');
    }
}
