@extends('main')

@section('content')
<div class="container-fluid">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <a href="{{route('all.authors')}}" class='btn btn-primary'>Back</a>
                </div>
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Edit Author</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="display-img text-center p-4">
                    <img src="{{$user->getAvatarUrlAttribute($author->avatar)}}" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card-body">
                    <form action="{{ route('author.update',$author->id)}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $author->name }}">
                        </div>

                        <div class="form-group">
                            <label for="address">Address</label>
                            <input type="text" name="address" class="form-control" value="{{ $author->address}}">
                        </div>


                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $author->phone}}">
                        </div>

                        <div class="form-group mb-3">
                            <label for="avatar">Image</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit" style="width: 70%;margin-top: 50px;">

                                Edit Author</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
