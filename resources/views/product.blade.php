@extends('master')

@section('content')
    <div class="container">
        <div class="slider">
{{--            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">--}}
{{--                <ol class="carousel-indicators">--}}
{{--                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>--}}
{{--                    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>--}}
{{--                    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>--}}
{{--                </ol>--}}
{{--                <div class="carousel-inner">--}}
{{--                    @foreach($data as $item)--}}
{{--                        <div class="carousel-item {{$item['id'] == 2?'active':''}}">--}}
{{--                            <img class="d-block w-50 slider-img" src="{{url($item['image'])}}" alt="First slide">--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
{{--                </div>--}}
{{--                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">--}}
{{--                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Previous</span>--}}
{{--                </a>--}}
{{--                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">--}}
{{--                    <span class="carousel-control-next-icon" aria-hidden="true"></span>--}}
{{--                    <span class="sr-only">Next</span>--}}
{{--                </a>--}}
{{--            </div>--}}
        </div>
        <section class="hero text-center">
            <br/>
            <br/>
            <br/>
            <br/>
            <h2 >
{{--                <strong>--}}
{{--                    Hey! Welcome to the Store--}}
{{--                </strong>--}}
            </h2>
            <br>
            <a href="#"><button class="button large">Check out our Collection</button></a>
        </section>
        <br>
        <br>
        <div class="trending-wrapper">
            <h2 align="center">Trending Products</h2>
            <div class="row">
                @forelse($trun_data->chunk(4) as $chunk)
                    @foreach($chunk as $item)
                        <div class="col-sm-3 d-flex align-items-stretch">
                            <div class="item-wrapper">
                                <div class="img-wrapper">
                                    <a class="button expanded add-to-cart" align="center">
                                        Add to Cart
                                    </a>
                                    <a href="#">
                                        <img class="img-trend" src="{{$item['image']}}"/>
                                    </a>
                                </div>
                                <a href="#">
                                    <h3>{{$item->name}}</h3>
                                </a>
                                <h5>
                                    {{$item->price}}
                                </h5>
                                <p>
                                    {{$item->description}}
                                </p>
                            </div>
                        </div>
                    @endforeach
                @empty
                    <h3>No Trending products</h3>
                @endforelse
        </div>
    </div>
@endsection

