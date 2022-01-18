<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Http;

class FacturationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.facturation.index');
    }

    public function enviar($id) 
    {

        $respuesta = Http::withHeaders([
            'Authorization' => 'Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NDE4Njc4MjYsImV4cCI6NDc5NTQ2NzgyNiwidXNlcm5hbWUiOiJzYW5kcmEiLCJjb21wYW55IjoiMjAwMDAwMDAwMDIifQ.JVTVlCDzEL5jrrAUR4TX-mFuKcN3wyXUpZN8-b-PVcQ6L3yQc7i7PHUT8fDAQvJfFNMDjlCpELrJaFjKrt32xGDU8s727BxjxCoJ0v-QAA7ToZ7CTAeTqArXicB5-laOg3ROTdluZs6trr1tkOdxC-vMXIseHE8bhAsvOb9G9MljDjQe4tgUMjN6ygtAUOz6kLFYTVAGbVEAi82YroZUd3rPHYmb7GV_v5lFdb-644yrFf9s-6ZVnuwcQDiNDx7fROssvTYAL7r3hNLzxaka924CeuCIT-xpERk3uSJAbIfBDTRE8dUCZId6CpwFZZLaxrhyswBR8Ltb-BxOwCqwuhLxS9h9O3SCmM3voVdygqiRifxvqT2_2b6_yE8nEs3hvvohIe7IDteMYlyd-4R7lb6khpEZ2dL64dneYy2bXyJvJ4-k_hh-cuuzPCdXDtjFsVkBDYLa0VCItnmAxK7_G4DMIaJHKCeD6M2owU-txLcjdKRox-AKdBr9niUNzJIIFH_KhBr9WJGFsnMYOmiFAQP9D1ie3uYSvD8gj64TN3rGExcrt3y3b3Ih32P7_1eD21RBccm-fu1YlDosRjrxUtnCHihiGCB4fd2YFsBDuSuskdjxXj_l255eSUvEIkZG3S-p4symgMI6xkxrCHv-Uptj7qFR4ZOsK89JZpJjGmw'
        ])->post('https://facturacion.apisperu.com/api/v1/invoice/send', [
            
                "ublVersion"=> "2.1",
                "tipoOperacion"=> "0101",
                "tipoDoc"=> "03",
                "serie"=> "B001",
                "correlativo"=> "1",
                "fechaEmision"=> "2021-01-27T00:00:00-05:00",
                "formaPago"=> [
                  "moneda"=> "PEN",
                  "tipo"=> "Contado"
                ],
                "tipoMoneda"=> "PEN",
                "client"=> [
                  "tipoDoc"=> "6",
                  "numDoc"=> 20000000001,
                  "rznSocial"=> "Cliente",
                  "address"=> [
                    "direccion"=> "Direccion cliente",
                    "provincia"=> "LIMA",
                    "departamento"=> "LIMA",
                    "distrito"=> "LIMA",
                    "ubigueo"=> "150101"
                    ]
                ],
                "company"=>  [
                  "ruc"=> 20000000002,
                  "razonSocial"=> "REMITEC",
                  "nombreComercial"=> "Mi empresa",
                  "address"=>  [
                    "direccion"=> "Direccion empresa",
                    "provincia"=> "LIMA",
                    "departamento"=> "LIMA",
                    "distrito"=> "LIMA",
                    "ubigueo"=> "150101"
                    ]
                ],
                "mtoOperGravadas"=> 100,
                "mtoIGV"=> 18,
                "valorVenta"=> 100,
                "totalImpuestos"=> 18,
                "subTotal"=> 118,
                "mtoImpVenta"=> 118,
                "details"=> [
                    [
                    "codProducto"=> "P001",
                    "unidad"=> "NIU",
                    "descripcion"=> "PRODUCTO 1",
                    "cantidad"=> 2,
                    "mtoValorUnitario"=> 50,
                    "mtoValorVenta"=> 100,
                    "mtoBaseIgv"=> 100,
                    "porcentajeIgv"=> 18,
                    "igv"=> 18,
                    "tipAfeIgv"=> 10,
                    "totalImpuestos"=> 18,
                    "mtoPrecioUnitario"=> 59
                    ]
                ],
                "legends"=> [
                  [
                    "code"=> "1000",
                    "value"=> "SON CIENTO DIECIOCHO CON 00/100 SOLES"
                    ]
                ]
             
        ]);

        $facturacion = $respuesta->json();

        $facturacionSuccess = $facturacion['sunatResponse']['success'] == true ? $facturacion['sunatResponse']['cdrResponse']['description'] : '';


        // $mensaje = $facturacionSuccess == true ?  $facturacion['sunatResponse']['cdrResponse']['description'] : "La boleta no ha sido aceptada"; 

        return view('admin.facturation.index', compact('facturacionSuccess'));
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
}
