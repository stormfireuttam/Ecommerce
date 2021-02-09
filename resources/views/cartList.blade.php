@extends('master')

@section('content')
    <div class="container py-3">
        <h2 align="center">Products Added to Cart</h2>
        <br><br>
                @foreach($products as $item)
                <div class="row cart-product-container justify-content">
                    <div class="col-sm-4 my-2 ml-5">
                        <a href="product/{{$item->id}}">
                            <img class="cart-image" src="{{$item->image}}"/>
                        </a>
                    </div>
                    <div class="col-sm-4 my-4">
                        <div>
                            <h2>{{$item->name}}</h2>
                            <h3>Price: ₹{{$item->price}}</h3>
                        </div>
                    </div>
                    <div class="col-sm-4 my-5">
                        <a href="/removeCart/{{$item->cart_id}}" class="btn btn-danger">Remove from Cart</a>
                    </div>
                </div>
                @endforeach
{{--            @empty--}}
{{--                <h3>No Products Found</h3>--}}
{{--            @endforelse--}}
        </div>
@endsection

