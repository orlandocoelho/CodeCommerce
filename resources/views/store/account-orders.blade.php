@extends('store.store')

@section('categories')
    @include('store.partial.account-menu')
@stop

@section('content')
    <div class="col-md-12">
        <table class="table">
            <tbody>
            <tr>
                <th>#ID</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
            </tr>

            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li> {{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="4"> Você não tem pedidos! </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop