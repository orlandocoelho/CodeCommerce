@extends('store.store')

@section('content')
    <div class="container">
       <h1>Pedido realizado com sucesso</h1>
        <p>O seu pedido #{{ $order->id }}, foi realizado com sucesso!</p>
    </div>
@stop