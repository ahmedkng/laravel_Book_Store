@extends('main')

@section('content')
<div class="container">

    <h4 class="my-4 p-4 bg-light">My orders</h4>

    @if($orders->count())
    <table class="table table-borderless table-striped mb-4">
        <thead>
            <tr>
                <th>Order id</th>
                <th scope="col">Book title</th>
                <th scope="col">Quantity</th>
                <th scope="col">Book price</th>
                <th scope="col">Total price</th>
                <th scope="col">Orders status</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach($orders as $order)
@foreach ($order->book as $book)
    
            <tr>
                <td>{{$order->id}}</td>
                <td><a href="{{route('book.details', $book->id)}}">{{$book->title}}</a></td>
                <td>{{$order->books_quantity}}</td>
                <td>&#8369;{{$book->price}}</td>
                <td>&#8369;{{$book->price * $order->books_quantity}}</td>
                
                <td>
                    @if($order->order_status == 0)
                    <span class="text-danger">Pending</span>
                    @else
                    <span class="text-success">Accepted</span>
                    @endif
                </td>
                <td><a href="{{route('order.details', $order->id)}}">Order Details</a></td>
            </tr>
            @endforeach
            @endforeach
        </tbody>
    </table>
    @else
    <div class="alert alert-warning">You have no order.</div>
    @endif
</div>
@endsection
