@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Auth::user()->user_tipe == 1)
              <a class="mx-3 btn btn-primary float-end mt-2" href="{{ url('products/create') }}">
                Agregar producto
              </a>
            @endif

            <h3 class="text-h3 text-center">Listado de Productos</h3>
            <div class="card">
                <table class="table table-hover text-center mt-2">
                  <thead>
                    <tr>
                      <th scope="col">Nombre</th>
                      <th scope="col">Precio</th>
                      <th scope="col">Impuesto</th>
                      @if(Auth::user()->user_tipe == 1)
                        <th scope="col">Editar</th>
                        <th scope="col">Eliminar</th>
                      @else
                        <th scope="col">Comprar</th>
                      @endif
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($products as $product)
                        <tr>
                          <td>{{$product->name}}</td>
                          <td>{{$product->price}}</td>
                          <td>{{$product->tax}}</td>
                          @if(Auth::user()->user_tipe == 1)
                            <td>
                                <a class="btn btn-warning" href="{{ url('products/'.$product->id.'/edit') }}">
                                    Editar
                                </a>
                            </td>
                            <td>
                                {!! Form::open(['url'=>'products/'.$product->id,'method'=>'delete']) !!}
                                    {!!Form::submit('Eliminar',['class' => 'btn btn-danger'])!!}
                                {!! Form::close() !!}
                            </td>
                          @else
                            <td>
                                {!! Form::open(['url' => '/compras','method'=>'post'])  !!}
                                    {{ Form::hidden('producto_id', $product->id) }}
                                    {!!Form::submit('Comprar',['class' => 'btn btn-success'])!!}
                                {!! Form::close() !!}
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