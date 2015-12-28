@extends('admin.layout')

@section('content')
    <div class="col-md-12">
        <table class="table">
            <tbody>
            <tr>
                <th>#ID</th>
                <th>User</th>
                <th>Itens</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Edit Status</th>
            </tr>

            @forelse($orders as $order)
                <tr>
                    <td>{{ $order->id }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>
                        <ul>
                            @foreach($order->items as $item)
                                <li> {{ $item->product->name }}</li>
                            @endforeach
                        </ul>
                    </td>
                    <td>{{ $order->total }}</td>
                    <td>{{ $order->status }}</td>
                    <td>


                        {!! Form::open(['route'=>['orders.update', $order->id], 'method'=>'put']) !!}
                        <div class="form-inline">
                            <div class="form-group">
                                {!! Form::select('status', [
                                    'Processing' => 'Processing',
                                    'Approved' => 'Approved',
                                    'Called Off' => 'Called Off',
                                    'On Route' => 'On Route'
                                 ], $order->status, ['class' => 'form-control']) !!}
                            </div>
                            {!! Form::submit('Edit Status', ['class'=>'btn btn-default']) !!}
                        </div>

                        {!! Form::close() !!}
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="4">Você não tem pedidos! </td>
                </tr>
            @endforelse
            </tbody>
        </table>
    </div>
@stop