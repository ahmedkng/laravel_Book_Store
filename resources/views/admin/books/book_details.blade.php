@extends('main')

@section('content')
<div class="container-fluid mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('my_orders')}}" class='btn btn-primary'>Back</a>
                </div>

                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Book information</h1>
                </div>

            </div>
        </div>
        <div class="card-body">

<table class="table">
    <thead>
        <tr>
            <th scope="col">Book ID</th>
            <th scope="col">Book Name</th>
            <th scope="col">Description</th>
            <th scope="col">Price</th>
            <th scope="col">Book Image</th>
            <th scope="col">Book Author</th>
        </tr>
    </thead>
    <tbody>
        <tr>
            <td>{{$book->id}}</td>
            <td>{{$book->title}}</td>
            <td>{{$book->description}}</td>
            <td>{{$book->price}}</td>
            <td><img src="{{$user->getAvatarUrlAttribute($book->image)}}" alt="{{$book->title}}" width="40px"
                    height="40px"></td>
            <td> {{ $book->author->name }}</td>


        </tr>

    </tbody>
</table>
</div> 
@endsection
