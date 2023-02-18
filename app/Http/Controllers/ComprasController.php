<?php

namespace App\Http\Controllers;

use App\Models\Compras;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class ComprasController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        $compras=Compras::where('client_id',Auth::user()->id)->with('client','product')->orderby('created_at')->get();
        return view('compras.index',compact('compras'));
    }


    public function store(Request $request)
    {
        $product= Product::find($request->producto_id);
        $client_id=Auth::user()->id;
        $tax_price=($product->price * $product->tax) /100;
        $all_price= $product->price + $tax_price;
        Compras::create([
            'client_id'=>$client_id,
            'producto_id'=>$product->id,
            'all_price'=>$all_price,
            'tax_price'=>$tax_price
        ]);
        return redirect('/products');
    }

    public function destroy(Compras $compra){
        $compra->delete();
        return redirect('/compras');
    }
}
