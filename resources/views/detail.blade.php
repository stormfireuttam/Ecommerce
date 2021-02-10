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
                    <h3>Price: ₹{{$product['price']}}</h3>
                    <h5>Description: {{$product['description']}}</h5>
                    <h5>Category: {{$product['category']}}</h5>
                </section>
                <br><br>
                    <form action="/add_to_cart" method="POST">
                        {{ csrf_field() }}
                        <div class="col-sm-4">
                            <input type="button" value="-"   id="sub">
                            <input type="text" size=2 name="quant" id="TextBox" value="1" />
                            <input type="button"  value="+"   id="add">
                        </div>
                        <div class="col-sm-4">
                            <input type="hidden" name="product_id" value="{{$product['id']}}">
                            <button class="btn btn-primary  px-3 m-2">Add to Cart</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

