@extends('store.store')

@section('content')
    <section id="cart_items">
        <div class="container">
            <div class="table-responsive cart_info">
                <table class="table table-condensed">
                    <thead>
                        <tr class="cart_menu">
                            <td class="image">Item</td>
                            <td class="descrition"></td>
                            <td class="price">Preço</td>
                            <td class="price">Quantidade</td>
                            <td class="price">Total</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                    @forelse($cart->all() as $k=>$item)

                        <tr>
                            <td class="cart_product">
                                <a href="{{route('product.store', ['id' => $k])}}">
                                <?php
                                    $product = $products->find($k);
                                ?>
                                    @if(count($product->images))
                                        <img src="{{url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" width="100" />
                                    @else
                                        <img src="{{url('images/no-img.jpg')}}" alt="" width="100" />
                                    @endif
                                </a>
                            </td>
                            <td class="cart_description">
                                <h4>
                                    <a href="{{route('product.store', ['id' => $k])}}">{{$item['name']}}</a>
                                </h4>
                                <p>Codigo: {{$k}}</p>
                            </td>
                            <td class="cart_price">
                               R$ {{ number_format($item['price'], 2, ',', '.')}}
                            </td>
                            <td class="cart_quantity">
                                <div class="form-group">
                                    <div class="input-group" style="width: 110px">
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] - 1)])}}" class="input-group-addon btn btn-default">-</a>
                                        {!! Form::text('', $item['qtd'], [
                                        'class' => 'cart_quantity_input form-control',
                                        'data-id' => $k,
                                        'data-uri' => route('cart.update', ['id' => $k]),
                                        'style' => 'text-align: center'
                                        ]) !!}
                                        <a href="{{ route('cart.update', ['id' => $k, 'qtd' => ($item['qtd'] + 1)])}}" class="input-group-addon btn btn-default">+</a>
                                    </div>
                                 </div>
                            </td>
                            <td class="cart_total">
                                <p class="cart_total_price"> R$ {{ number_format($item['price'] * $item['qtd'], 2, ',', '.')}}</p>
                            </td>
                            <td class="cart_delete">
                                <a href="{{route('cart.destroy', ['id' => $k])}}" class="cart_quantity_delete">Delete</a>
                            </td>
                        </tr>
                    @empty
                            <tr>
                                <td colspan="6" >
                                    <p  class="text-center">
                                        Seu carrinho está vazio!
                                    </p>
                                </td>
                            </tr>
                    @endforelse
                        <tr class="cart_menu">
                            <td colspan="6" >
                                <div class="pull-right">
                                <span style="margin-right: 120px">
                                    Total: R$ {{ number_format($cart->getTotal() , 2, ',', '.')}}
                                </span>
                                    <a href="#" class="btn btn-success" style="margin-right: 50px">Finalizar</a>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>
@stop