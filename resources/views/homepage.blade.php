@extends('main')

@section('content')
<section class="main-content">
    <div class="container">
        <div class="row">
            <!-- Sidebar Content -->
            <div class="col-md-8">
                <div class="content-area">
                    <div class="card my-4">
                        <div class="card-header bg-primary">
                            <h4 style="color: white">Engineering Books </h4>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                @foreach($books as $book)
                                <div class="col-lg-3 col-6">
                                    <div class="book-wrap">
                                        <div class="book-image mb-2">
                                            <a href="{{route('order.create',$book->id)}}"><img src="{{$user->getAvatarUrlAttribute($book->image)}}" alt="" width="200px" height="200px"></a>
                                        </div>
                                        <div class="book-title mb-2">
                                            <h3>{{$book->title }}</h3>
                                        </div>

                                        <div class="book-price mb-3">

                                            <span><strong>&#8369;{{$book->price}}</strong></span>
                                        </div>
                                    </div>
                                </div>
                                @endforeach

                            </div>
                            <div class="show-more pt-2 text-right">
                                <a href="" class="text-secondary">See More </a>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
