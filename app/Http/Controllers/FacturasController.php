<?php

namespace App\Http\Controllers;

use App\Models\Facturas;
use App\Models\Compras;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Auth;

class FacturasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(){
        $facturas=Facturas::orderby('created_at')->with('client')->get();
        $facturas->map(function ($factura){
            $factura->products_invoces=json_decode($factura->products_invoces);
        });
        return view('facturas.index',compact('facturas'));
    }


    public function store(Request $request){
        $compras=Compras::where('invoiced',false)->with('product')->get();
        if (count($compras)>0) {
            $facturas=[];
            foreach ($compras as $compra) {
                $client_repeat=false;
                for ($i=0; $i < count($facturas); $i++) { 
                    if ($facturas[$i]['client_id']==$compra->client_id) {
                        $facturas[$i]['total']=$facturas[$i]['total']+$compra->all_price;
                        $facturas[$i]['tax_total']=$facturas[$i]['tax_total']+$compra->tax_price;
                        array_push($facturas[$i]['products_invoces'],$compra->product);
                        $client_repeat=true;
                    }
                }
                if(!$client_repeat){
                    array_push($facturas, [
                        'total'=>0+$compra->all_price,
                        'tax_total'=>0+$compra->tax_price,
                        'products_invoces'=>[$compra->product],
                        'client_id'=>$compra->client_id,
                    ]);
                }
            }
            foreach ($facturas as $factura) {
                $factura['products_invoces'] = json_encode($factura['products_invoces']);
                $newfact=Facturas::create($factura);
                $compras->map(function($compra) use($newfact) {
                    if ($compra->client_id==$newfact->client_id) {
                        $compra->invoiced=true;
                        $compra->factura_id=$newfact->id;
                        $compra->save();
                    }
                });
            }
        }
        return redirect('/facturas');
    }

    /**
     * Display the specified resource.
     */
    public function show(Facturas $factura){
        $factura->products_invoces=json_decode($factura->products_invoces);
        return view('facturas.show',compact('factura'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Facturas $factura): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Facturas $factura): RedirectResponse
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Facturas $facturas): RedirectResponse
    {
        //
    }
}
