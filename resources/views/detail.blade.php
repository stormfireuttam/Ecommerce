@extends('master')

@section('content')
    <div class="container">
        <div class="row detail-section">
            <div class="col-sm-6">
                <img class="img-detail" src="{{$product['image']}}" alt="product image">
            </div>
            <div class="col-sm-6">
                <br><br><br>
                <a href="/">Go Back</a>
                <section>
                    <h2>{{$product['name']}}</h2>
                    <h3>Price: {{$product['price']}}</h3>
                    <h5>Description: {{$product['description']}}</h5>
                    <h5>Category: {{$product['category']}}</h5>
                </section>
                <br><br>
                <div class="btn-group" role="group" aria-label="Basic example">
                    <form action="/add_to_cart" method="POST">
                        {{ csrf_field() }}
                        <input type="hidden" name="product_id" value="{{$product['id']}}">
                        <button class="btn btn-primary  px-3 m-2">Add to Cart</button>
                    </form>
                    <button type="button" class="btn btn-success  px-3 m-2">Buy Now</button>
                </div>
            </div>
        </div>
    </div>
@endsection

