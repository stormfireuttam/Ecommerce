@extends('master')

@section('content')
    <div class="container py-3">
        <h2 align="center">Order Summary</h2>
        <br><br>
        <div class="">
            <table class="table table-dark table-striped">
                <tbody>
                <tr>
                    <td>Amount</td>
                    <td>₹{{$total}}</td>
                </tr>
                <tr>
                    <td>Tax</td>
                    <td>₹{{0.01 * $total}}</td>
                </tr>
                <tr>
                    <td>Delivery Charges</td>
                    <td>₹{{$total==0?0:200}}</td>
                </tr>
                <tr>
                    <td>Total amount</td>
                    <td>₹{{$total + ($total==0?0:200) + ($total * 0.01)}}</td>
                </tr>
                </tbody>
            </table>
            <form action="/placeOrder" method="POST">
                {{ csrf_field() }}
                <div class="mb-3">
                    <label for="address" class="form-label">Address</label>
                    <textarea class="form-control" name="address" id="order-address" rows="2"></textarea>
                </div>
                <div class="mb-3 mx-auto">
                    <label for="payment" class="form-label">Payment Method</label>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="payment" value="Paytm" id="option1" checked>
                        <label class="form-check-label" for="option1">
                            Pay Via Paytm
                        </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="payment" value="UPI" id="option2">
                        <label class="form-check-label" for="option2">
                            Pay Via UPI
                        </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="payment" value="Card" id="option3">
                        <label class="form-check-label" for="option3">
                            Pay Via Cards
                        </label>
                    </div>
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="radio" name="payment" value="Cash" id="option4">
                        <label class="form-check-label" for="option4">
                            Cash On Delivery
                        </label>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Order Now</button>
            </form>
        </div>
    </div>
@endsection

