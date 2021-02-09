@extends('master')

@section('content')
    <div class="container my-4 py-3">
        <h2 align="center">Our Collection</h2><br>
        <div>{{$data->links()}}</div>
        <div class="row mb-5">
                @foreach($data as $item)
                    <div class="col-sm-3 d-flex align-items-stretch">
                        <div class="item-wrapper">
                            <div class="img-wrapper">
                                <a class="button expanded add-to-cart" align="center" href="product/{{$item->id}}">
                                    View Item
                                </a>
                                <a href="#">
                                    <img class="img-trend" src="{{$item->image}}"/>
                                </a>
                            </div>
                            <a href="product/{{$item->id}}">
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
        </div>
        <div>{{$data->links()}}</div>
    </div>
@endsection

