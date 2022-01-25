<?php

namespace App\Http\Controllers;

use App\Models\Kardex;
use App\Models\Product;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade as PDF;

class KardexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kardexs = Kardex::join("products", "products.id", "=", "kardex.producto_id")
        ->select("kardex.id","kardex.producto_id","kardex.input_units","kardex.input_cost","kardex.output_units","kardex.output_cost","kardex.kardex_date","products.name")
        ->get();
        // dd($kardexs);
        return view('admin.kardex.index',compact('kardexs'));
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
    public function show(Kardex $kardex)
    {
        $product=Product::Find($kardex['producto_id']);
        // dd($product); 
        return view('admin.kardex.show',compact('kardex','product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    public function results(Request $request){
        $fi = $request->fecha_ini. ' 00:00:00';
        $ff = $request->fecha_fin. ' 23:59:59';
        $kardexs = Kardex::whereBetween('kardex_date', [$fi, $ff])->get();
        return view('admin.kardex.index', compact('kardexs'));
        
    }

    public function pdf(Kardex $kardex)
    {
        
        // $product=Product::Find($kardex['producto_id']);
        // $pdf = PDF::loadView('admin.kardex.pdf', compact('kardex', 'product'));
        // dd($pdf);
        // return $pdf->download('Kardex_'.$kardex->id.'.pdf');
    }
}
