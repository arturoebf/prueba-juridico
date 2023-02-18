@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::open(['url' => '/products/'.$product->id,'method'=>'put']) !!}
                    <h3 class="text-h3 text-center m-2">Editar Producto</h3>
                    <div class="row m-2 text-center aling-center">
                        <div class="col-4">
                            {!!Form::label('name', 'Nombre del Producto', ['class' => 'form-label'])!!}
                            {!!Form::text('name', $product->name,['class' => 'form-control','placeholder'=>'Nombre del Producto'])!!}
                        </div>
                        <div class="col-4">
                            {!!Form::label('price', 'Precio del Producto', ['class' => 'form-label'])!!}
                            {!!Form::number('price', $product->price,['class' => 'form-control','placeholder'=>'Precio del Producto'])!!}
                        </div>
                        <div class="col-4 ">
                            {!!Form::label('tax', 'Impuesto del Producto', ['class' => 'form-label'])!!}
                            {!!Form::number('tax', $product->tax,['class' => 'form-control','placeholder'=>'Impuesto del Producto'])!!}
                        </div>
                        <div class="col-4 mx-auto my-3">
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                        </div>
                        <div class="col-12 my-2">
                            {!!Form::submit('Editar',['class' => 'btn btn-warning'])!!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection