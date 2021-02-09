@extends('master')

@section('content')
    <div class="container my-4 py-3">
        <h2 align="center">Search Results</h2>
        <div class="row">
            @forelse($data->chunk(4) as $chunk)
                @foreach($chunk as $item)
                    <div class="col-sm-3 d-flex align-items-stretch">
                        <div class="item-wrapper">
                            <div class="img-wrapper">
                                <a class="button expanded add-to-cart" align="center" href="product/{{$item['id']}}">
                                    View Item
                                </a>
                                <a href="#">
                                    <img class="img-trend" src="{{$item['image']}}"/>
                                </a>
                            </div>
                            <a href="product/{{$item['id']}}">
                                <h3>{{$item->name}}</h3>
                            </a>
                            <h5>
                                ₹{{$item->price}}
                            </h5>
                            <p>
                                {{$item->description}}
                            </p>
                        </div>
                    </div>
                @endforeach
            @empty
                <h3>No Products Found</h3>
            @endforelse
        </div>
    </div>
@endsection

