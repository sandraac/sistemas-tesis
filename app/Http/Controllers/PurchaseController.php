<?php

namespace App\Http\Controllers;

use App\Models\Purchase;
use App\Models\Provider;
use App\Models\Product;
use App\Models\PurchaseDetails;
use Illuminate\Http\Request;
use App\Http\Requests\Purchase\StoreRequest;
use App\Http\Requests\Purchase\UpdateRequest;
use App\Models\Kardex;
use Barryvdh\DomPDF\Facade as PDF;


class PurchaseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware([
            'permission:purchases.index',
            'permission:purchases.create',
            'permission:purchases.store',
            'permission:purchases.show',
            'permission:purchases.edit',
            'permission:purchases.update',
            'permission:purchases.destroy',
            'permission:purchases.pdf',
            'permission:upload.purchases',
            'permission:change.status.purchases',
        ]);
    }

    public function index()
    {
        $purchases = Purchase::get();
        return view('admin.purchase.index', compact('purchases'));
    }
    public function create()
    {
        $providers = Provider::get();

        $products = Product::pos_products()->get();

        return view('admin.purchase.create', compact('providers','products'));
    }
    public function store(StoreRequest $request, Purchase $purchase)
    {
        $purchase->my_store($request);
        return redirect()->route('purchases.index')->with('toast_success', '¡Compra registrada con éxito!');
    }
    public function show(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.show', compact('purchase', 'purchaseDetails', 'subtotal'));
    }
    public function edit(Purchase $purchase)
    {
        // $providers = Provider::get();

        $providers = Provider::get();

        $products = Product::pos_products()->get();

        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        //dd($purchaseDetails);
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        return view('admin.purchase.edit', compact('purchase', 'purchaseDetails', 'subtotal', 'products', 'providers'));

        // return view('admin.purchase.edit', compact('purchase', 'products', 'providers', ''));
        // $providers = Provider::get();
        // return view('admin.purchase.edit', compact('purchase'));
    }
    public function update(UpdateRequest $request, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }
    public function destroy(Purchase $purchase)
    {
        // $purchaseDetail = PurchaseDetails::findOrFail($purchase->id);
        // $purchaseDetail->delete();
        // $purchase->delete();
       // dd($purchaseDetail[0]);
        //$purchase->delete();
        //return redirect()->route('purchases.index')->with('toast_success', '¡Producto eliminado con éxito!');
    }

    public function pdf(Purchase $purchase)
    {
        $subtotal = 0 ;
        $purchaseDetails = $purchase->purchaseDetails;
        foreach ($purchaseDetails as $purchaseDetail) {
            $subtotal += $purchaseDetail->quantity * $purchaseDetail->price;
        }
        $pdf = PDF::loadView('admin.purchase.pdf', compact('purchase', 'subtotal', 'purchaseDetails'));
        return $pdf->download('Reporte_de_compra_'.$purchase->id.'.pdf');
    }
    
    public function upload(Request $reques, Purchase $purchase)
    {
        // $purchase->update($request->all());
        // return redirect()->route('purchases.index');
    }

    public function change_status(Purchase $purchase)
    {
        
        if ($purchase->status == 'VALID') {
            $purchase->update(['status'=>'CANCELED']);
            $products=PurchaseDetails::Where('purchase_id','=',$purchase['id'])->get()->toArray();
            foreach($products as $product){
                //dd($product);
                $kardex=new Kardex();
                $kardex->producto_id=$product['product_id'];
                $kardex->input_units=$product['quantity'];
                $kardex->input_cost=$product['quantity']*$product['price'];
                $kardex->kardex_date=date("Y-m-d H:i:s");
                //dd($kardex);
                
                $kardex->save();
            }
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } else {
            $purchase->update(['status'=>'VALID']);
            return redirect()->back()->with('toast_success', '¡Estado cambiado con éxito!');
        } 
    }
}
