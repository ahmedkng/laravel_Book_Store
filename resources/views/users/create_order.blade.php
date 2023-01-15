@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <img src="{{$user->getAvatarUrlAttribute($book->image)}}" alt="" height="400px" width="300px">
        </div>
        <div class="col-8">
            <div class="row py-3 px-lg-5">
                <h1 class="h1">{{ $book->title }}</h1>
            </div>
            <div class="row py-3 px-lg-5">
                <h3>
                    <p class="book-details-info-text">{{$book->description }}</p>
                </h3>
            </div>
            <div class="row py-3 px-lg-5">
                <div class="h3 text-muted">Rs. {{ $book->price}}</div>
            </div>
            <div class="row py-3 px-lg-5">
                <form action="{{ route('order.add' , $book->id) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" value="1" name="qty" min='1' max="99" class="form-control">
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control">
                        </div>

                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>

                            <button type="submit" class="btn btn-success btn-lg" style="margin-top: 100px"> snbmit
                            </button>


                    </div>
                </form>
                <a href="{{route('home')}}" class="btn btn-primary btn-lg" style="margin-top: 30px">Back</a>
            </div>
        </div>
    </div>
    @endsection