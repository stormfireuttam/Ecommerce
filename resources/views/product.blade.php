@extends('master')

@section('content')
    <div class="container">
        <section class="hero text-center">
            <br><br><br><br><br><br><br><br>
            <a href="/products" class="btn btn-dark btn-lg">Check out our Collection</a>
        </section>
        <br>
        <br>
        <div class="trending-wrapper">
            <h2 align="center">Trending Products</h2>
            <div class="row mb-5">
                @forelse($trun_data->chunk(4) as $chunk)
                    @foreach($chunk as $item)
                        <div class="col-sm-3 d-flex align-items-stretch">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <a class="button expanded add-to-cart" align="center" href="/product/{{$item['id']}}">
                                        View Item
                                    </a>
                                    <a href="#">
                                        <img class="img-trend" src="{{$item['image']}}"/>
                                    </a>
                                </div>
                                <a href="/product/{{$item['id']}}">
                                    <h3>{{$item->name}}</h3>
                                </a>
                                <h5>
                                    ₹{{$item->price}}
                                </h5>
{{--                                <p>--}}
{{--                                    {{$item->description}}--}}
{{--                                </p>--}}
                            </div>
                        </div>
                    @endforeach
                @empty
                    <h3>No Trending products</h3>
                @endforelse
        </div>
    </div>
@endsection

