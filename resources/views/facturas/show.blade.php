@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <a class="mx-3 btn btn-primary float-end mt-2" href="{{ url('/facturas') }}">
                Volver
            </a>
            <h3 class="text-h3 text-center">Factura Nº {{$factura->id}}</h3>
            <div class="card">
                  <div class="card-body">
                    <h5 class="card-title text-center"><strong>Nombre del CLiente: {{$factura->client->name}}</strong></h5>
                    <p class="card-text"></p>
                  </div>
                  <ul class="list-group list-group-flush">
                    <li class="list-group-item"><strong>Productos adquiridos: {{count($factura->products_invoces)}}</strong></li>
                    <li class="list-group-item">
                        <ul>
                            @foreach($factura->products_invoces as $product)
                                <li>
                                    <strong>{{$product->name}}</strong> - 
                                    Impuesto: <strong>{{$product->tax}}%</strong> - 
                                    Valor del Impuesto: <strong>{{round(($product->price * $product->tax) /100, 2)}}</strong> - 
                                    Precio: <strong>{{round($product->price+(($product->price * $product->tax) /100),2)}}</strong>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    <li class="list-group-item"><strong>Impuesto Total: {{$factura->tax_total}}</strong></li>
                    <li class="list-group-item"><strong>Total a pagar: {{$factura->total}}</strong></li>
                  </ul>
            </div>
        </div>
    </div>
</div>
@endsection