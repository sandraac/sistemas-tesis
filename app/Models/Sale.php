<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

class Sale extends Model
{
    use HasFactory;
    protected $fillable = [
        'client_id',
        'user_id',
        'sale_date',
        'tax',
        'total',
        'status',
    ];
    public function user(){
        return $this->belongsTo(User::class);
    }
    public function client(){
        return $this->belongsTo(User::class);
    }
    public function saleDetails(){
        return $this->hasMany(saleDetail::class);
    }
    public function update_stock($id, $quantity){
        $product = Product::find($id);
        $product->subtract_stock($quantity);
    }
    public function my_store($request){
        
        $products=$request->ToArray();
        //dd($products);
        for($i=0;$i<count($products['product_id']);$i++){
            $kardex=new Kardex();
            $kardex->producto_id=$products['product_id'][$i];
            $kardex->output_units=$products['quantity'][$i];
            $kardex->output_cost=$products['quantity'][$i]*$products['price'][$i];
            $kardex->kardex_date=date("Y-m-d H:i:s");
            $kardex->save();
        }
        $sale = self::create($request->all()+[
            'user_id'=>Auth::user()->id,
            'sale_date'=>Carbon::now('America/Lima'),
        ]);
        $sale->add_sale_details($request);
    }
    public function add_sale_details($request){
        foreach ($request->product_id as $key => $product) {
            $this->update_stock($request->product_id[$key], $request->quantity[$key]);
            $results[] = array("product_id"=>$request->product_id[$key], "quantity"=>$request->quantity[$key], "price"=>$request->price[$key], "discount"=>$request->discount[$key]);
        }
        $this->saleDetails()->createMany($results);
    }
}
