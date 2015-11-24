@extends('store.store')

@section('categories')
    @include('store.partial.categories')
@stop

@section('content')
    <div class="col-sm-9 padding-right">
        <div class="product-details"><!--product-details-->
            <div class="col-sm-5">
                <div class="view-product">
                    @if(count($product->images))
                        <img src="{{url('uploads/'.$product->images->first()->id.'.'.$product->images->first()->extension)}}" alt="" width="200" />
                    @else
                        <img src="{{url('images/no-img.jpg')}}" alt="" width="200" />
                    @endif
                </div>
                <div id="similar-product" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <a href="#"><img src="http://commerce.dev:10088/uploads/10.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/11.jpg" alt="" width="80"></a>
                            <a href="#"><img src="http://commerce.dev:10088/uploads/12.jpg" alt="" width="80"></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-7">
                <div class="product-information"><!--/product-information-->
                    <h2>{{ $product->category->name }} :: {{ $product->name }}</h2>

                    <p>
                        {{ $product->description }}
                    </p>
                            <span>
                                <span>R$ {{ number_format($product->price , 2, ',', '.')}}</span>
                                    <a href="{{route('cart.add', ['id' => $product->id ]) }}" class="btn btn-fefault cart">
                                        <i class="fa fa-shopping-cart"></i>
                                        Adicionar no Carrinho
                                    </a>
                            </span>
                    <h2>
                        Tags:
                        @foreach($product->tags as $tag)
                            <a href="{{ route('tag.store', ['id' => $tag->id]) }}">
                                {{ $tag->name }}
                            </a>
                        @endforeach
                    </h2>
                </div>
                <!--/product-information-->
            </div>
        </div>
        <!--/product-details-->
    </div>
@stop