@extends('main')

@section('content')
<div class="container">
    <h4 class="my-4 p-4 bg-light">Order Details</h4>

    <div class="card my-4">
        <div class="card-header">
            <h4>User data</h4>
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
        <tbody>
       @foreach ($order->book as $book )


          <td>{{$book->title}}</td>
          <td>{{$order->books_quantity}}</td>
          <td>&#8369;{{$book->price}}</td>
          <td>0</td>
        </tr>
        <tr>
            <td colspan="2"></td>
            <td><strong>Total</strong></td>
            <td><strong>&#8369;{{$book->price * $order->books_quantity}}</strong></td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>
</div>
@endsection
