@extends('main')

@section('content')

<div class="container-fluid mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-5">
                    <a href="{{route('books.index')}}" class='btn btn-primary'>Back</a>
                </div>

                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Edit a Book: {{$book->title}}</h1>
                </div>

            </div>
        </div>
        <div class="card-body">
            <form action="{{route('books.update',$book->id)}}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="form-group mb-3">
                    <label for="name">Title</label>
                    <input type="text" name="title" class="form-control" value="{{ $book->title }}">
                </div>

                <div class="form-group mb-3">
                    <label for="price">Price</label>
                    <input type="number" name="price" class="form-control" value={{$book->price}}>
                </div>

                <div class="form-group mb-3">
                    <label for="image">Image</label>
                    <input type="file" name="image" class="form-control">
                </div>
                <div class="form-group mb-3">
                    <label for="image">Author</label>
                    <select class="form-control input-sm " name="author" id="author">
                        @foreach ($authors as $author)
                        <option value="{{ $author->id }}" {{ $author->id == $book->author_id ? 'selected' : '' }}>
                            {{ $author->name }}</option>
                        @endforeach

                    </select>
                </div>
                <div class="form-group">
                    <label for="description">Description</label><br>
                    <textarea name="description" id="description" cols="30" rows="6"
                        class="form-control">{{$book->description}}</textarea>
                </div>

                <div class="form-group text-center">
                    <button class="btn btn-success mt-5" type="submit" style="width: 100%;">Edit Book</button>
                </div>
            </form>

        </div>
    </div>
</div>
@endsection
