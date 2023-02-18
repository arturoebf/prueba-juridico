@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <table class="table table-hover text-center">
                  <thead>
                    <tr>
                      <th scope="col">Nº Compra</th>
                      <th scope="col">Nombre Cliente</th>
                      <th scope="col">Producto</th>
                      <th scope="col">Precio Producto</th>
                      <th scope="col">Precio de Impuesto</th>
                      <th scope="col">Monto Total</th>
                      <th scope="col">Eliminar compra</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($compras as $compra)
                        <tr>
                          <td>{{ $loop->index +1}}</td>
                          <td>{{$compra->client->name}}</td>
                          <td>{{$compra->product->name}}</td>
                          <td>{{$compra->product->price}}</td>
                          <td>{{$compra->tax_price}}</td>
                          <td>{{$compra->all_price}}</td>
                          @if($compra->invoiced == 0)
                            <td>
                              {!! Form::open(['url'=>'/compras/'.$compra->id,'method'=>'delete']) !!}
                                {!!Form::submit('Eliminar',['class' => 'btn btn-danger'])!!}
                              {!! Form::close() !!}
                            </td>
                          @else
                            <td class="bg-success">
                              Facturado
                            </td>
                          @endif
                        </tr>
                    @endforeach
                  </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection