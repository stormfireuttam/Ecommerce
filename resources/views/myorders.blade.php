@extends('master')

@section('content')
    <div class="container py-3">
        <h2 align="center">Orders Made</h2>
        <br><br>
        <table class="table table-dark table-striped">
            <tbody>
            @if(count($orders) == 1)
                <tr>
                    <td>Order Id: {{$orders->order_id}}</td>
                </tr>
                <tr>
                    <td>Name: {{$orders->name}}</td>
                    <td>Quantity: {{$orders->qty}}</td>
                    <td>Price: ₹{{$orders->price}}</td>
                </tr>
            @elseif(count($orders) > 1)
                <tr>
                    <td>Order Id: {{$orderId}}</td>
                </tr>
                @foreach($orders as $order)
                    @if($order->order_id == $orderId)
                    <tr>
                        <td>Name: {{$order->name}}</td>
                        <td>Quantity: {{$order->qty}}</td>
                        <td>Price: ₹{{$order->price}}</td>
                    </tr>
                    @else
                        <script>
                            {{$orderId = $order->order_id}}
                        </script>
                    <tr>
                        <td>Order Id: {{$order->order_id}}</td>
                    </tr>
                    <tr>
                        <td>Name: {{$order->name}}</td>
                        <td>Quantity: {{$order->qty}}</td>
                        <td>Price: ₹{{$order->price}}</td>
                    </tr>
                @endif
                @endforeach
            @else
                <h3>No Orders Made</h3>
            @endif
            </tbody>
        </table>
    </div>
@endsection

