@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->user_tipe == 1)
                {!! Form::open(['url' => '/facturas','method'=>'post'])  !!}
                    {!!Form::submit('Generar Facturas',['class' => 'btn btn-success mx-3 float-end mt-2'])!!}
                {!! Form::close() !!}
            @endif
            <h3 class="text-h3 text-center">Facturas Generadas</h3>
            <div class="card">
                <table class="table table-hover text-center mt-2">
                  <thead>
                    <tr>
                      <th scope="col">Nº Factura</th>
                      <th scope="col">Cliente</th>
                      <th scope="col">Productos adquiridos</th>
                      <th scope="col">Impuesto Total</th>
                      <th scope="col">Total</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($facturas as $factura)
                        <tr>
                          <td>{{$factura->id}}</td>
                          <td>{{$factura->client->name}}</td>
                          <td>{{count($factura->products_invoces)}}</td>
                          <td>{{$factura->tax_total}}</td>
                          <td>{{$factura->total}}</td>
                          <td>
                            <a class="btn btn-primary" href="{{ url('facturas/'.$factura->id) }}">
                              Ver Factura
                            </a>
                          </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection