@extends('master')

@section('content')
    <div class="container my-4 py-3">
        <h2 align="center">Our Collection</h2><br>
{{--        Adding Filters on Top of the Page--}}
            <div class="row justify-content-between">
{{--                Filter for Categories--}}
                <div class="dropdown col-md-4">
                    <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false">
                        Choose Category
                    </a>
                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        @foreach($categories as $category)
                        <li><a class="dropdown-item" href="/products/{{$category->name}}">{{$category->name}}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        <br>
        @if(count($data) > 0)
{{--        Pagination Indexes  --}}
        <div>{{$data->links()}}</div>
{{--        Products to be Displayed    --}}
        <div class="row mb-5">
                @foreach($data as $item)
                    <div class="col-sm-3 d-flex align-items-stretch">
                        <div class="item-wrapper">
                            <div class="img-wrapper">
                                <a class="button expanded add-to-cart" align="center" href="/product/{{$item->id}}">
                                    View Item
                                </a>
                                <a href="#">
                                    <img class="img-trend" src="{{$item->image}}"/>
                                </a>
                            </div>
                            <a href="/product/{{$item->id}}">
                                <h3>{{$item->name}}</h3>
                            </a>
                            <h5>
                                ₹{{$item->price}}
                            </h5>
                        </div>
                    </div>
                @endforeach
        </div>
{{--        Pagination Indexes  --}}
        <div>{{$data->links()}}</div>


        @else
            <h5>No Products Found</h5>
        @endif
    </div>
@endsection

