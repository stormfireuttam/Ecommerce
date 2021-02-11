@extends('master')

@section('content')
    <div class="container">
        <div class="row detail-section">
            <div class="col-sm-6">
                <img class="img-detail" src="{{$product['image']}}" alt="product image">
            </div>
            <div class="col-sm-6">
                <br><br>
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
                        <div class="row justify-content-start">
                            <script>
                                var lowerLimit = 0;
                                var upperLimit = {{$product->quantity}};

                                $(document).ready(function(){
                                    $('#add').click( function() {
                                        var counter = $('#TextBox').val();
                                        if(counter >= upperLimit) {
                                            $('#TextBox').val(upperLimit);
                                        }
                                        else
                                            counter ++;
                                        $('#TextBox').val(counter);
                                    });
                                    $('#sub').click( function() {
                                        var counter = $('#TextBox').val();
                                        if(counter==1)
                                        {
                                            $('#TextBox').val(0);
                                        }
                                        else
                                            counter-- ;
                                        $('#TextBox').val(counter);
                                    });
                                });
                            </script>
                            <div class="col-4">
                                <input type="button" value="-"   id="sub">
                                <input type="text" size=2 name="product_qty" id="TextBox" value="1" readonly/>
                                <input type="button"  value="+"   id="add">
                            </div>
                            <div class="col-4">
                                <input type="hidden" name="product_id" value="{{$product['id']}}">
                                <button class="btn btn-primary">Add to Cart</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

