@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                {!! Form::open(['url' => '/products','method'=>'post']) !!}
                    <h3 class="text-h3 text-center m-2">Agregar Producto</h3>
                    <div class="row m-2 text-center aling-center">
                        <div class="col-4">
                            {!!Form::label('name', 'Nombre del Producto', ['class' => 'form-label'])!!}
                            {!!Form::text('name', null,['class' => 'form-control','placeholder'=>'Nombre del Producto'])!!}
                        </div>
                        <div class="col-4">
                            {!!Form::label('price', 'Precio del Producto', ['class' => 'form-label'])!!}
                            {!!Form::number('price', null,['class' => 'form-control','placeholder'=>'Precio del Producto'])!!}
                        </div>
                        <div class="col-4 ">
                            {!!Form::label('tax', 'Impuesto del Producto', ['class' => 'form-label'])!!}
                            {!!Form::number('tax', null,['class' => 'form-control','placeholder'=>'Impuesto del Producto'])!!}
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
                            {!!Form::submit('Agregar',['class' => 'btn btn-success'])!!}
                        </div>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div>
@endsection