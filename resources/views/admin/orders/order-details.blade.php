@extends('main')

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="container-fluid">
                <h4 class="my-4 p-4 bg-light">Order Details of order no <b>{{$order->id}}</b></h4>

                <div class="card my-4">
                    <div class="card-header">
                        <h4>Billing Address</h4>
                    </div>
                    <div class="card-body">
                        <label>user name</label>
                        <p style="color: red;"><i class="fas fa-user"></i> <span class="mx-2">{{$order->user->name}}</span></p>
                        <label>user phone</label>
                        <p style="color: red;"><i class="fas fa-phone"></i><span class="mx-2">{{$order->user->phone}}</span></p>
                        <label>user address</label>
                        <p style="color: red;"><i class="fas fa-map-marked"></i> <span class="mx-2">{{$order->user->address}}</span></p>
                    </div>
                </div>
                <div class="order-product mb-4">
                    <h4 class="my-4 p-4 bg-light">Order information</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th scope="col">Book Name</th>
                            <th scope="col">Quantity</th>
                            <th scope="col">Price</th>
                            <th scope="col">Sub Total</th>
                        </tr>
                        </thead>
                        @foreach ($order->book as $book )
                            <tbody>                   
                            <tr>
                                <td>{{$book->title}} </td>
                                <td>{{$order->books_quantity}}</td>
                                <td>{{$book->price}} TK</td>
                                <td>{{$book->price * $order->books_quantity}} TK</td>
                            </tr>         
                        <tr>
                            <td colspan="2"></td>
                            <td><strong>Total</strong></td>
                            <td>{{$book->price * $order->books_quantity}} TK</td>
                        </tr>
                        </tbody>
                        @endforeach
                        
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
