@extends('master')

@section('content')
    <div class="container py-3">
        <h2 align="center">Orders Made</h2>
        <br><br>
        @forelse($orders->chunk(4) as $chunk)
            @foreach($chunk as $item)
            <div class="row cart-product-container justify-content">
                <div class="col-sm-6 my-2 ml-5">
                    <a href="product/{{$item->id}}">
                        <img class="cart-image" src="{{$item->image}}"/>
                    </a>
                </div>
                <div class="col-sm-6 my-4">
                    <div>
                        <h2>{{$item->name}}</h2>
                        <h3>Price: ₹{{$item->price}}</h3>
                        <h5>Payment Mode: {{$item->payment_method}}</h5>
                        <h5>Address: {{$item->address}}</h5>
                        <h5>Payment Status: {{$item->payment_status}}</h5>
                    </div>
                </div>
            </div>
        @endforeach
        @empty
            <h3>No Orders Made</h3>
        @endforelse
    </div>
@endsection

