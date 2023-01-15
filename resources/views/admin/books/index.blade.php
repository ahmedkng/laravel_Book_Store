@extends('main')

@section('content')
<div class="container-fluid mt-5">
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col-md-1">
                    <a href="{{route('home')}}" class='btn btn-primary'>Back</a>
                </div>
                <div class='col-md-4'>
                    <a href="{{route('books.create')}}" class="btn btn-success ">Add New Book</a>
                </div>
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">All Books</h1>
                </div>

            </div>
        </div>
       <div class="card-body">
<div class="row" style="margin-top: 30px">
    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">Title</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Author</th>
                <th scope="col">Edit</th>
                <th scope="col">Delete</th>
            </tr>
        </thead>
        <tbody>
            @if($books->count()>0)
            @foreach($books as $book)
            <tr>
                <td>
                    {{$book->id}}
                </td>
                <td>
                    {{$book->title}}
                </td>

                <td>
                    <img src="{{$user->getAvatarUrlAttribute($book->image)}}" alt="{{$book->title}}" width="40px"
                        height="40px">
                </td>
                <td>
                    {{$book->description}}
                </td>
                <td>
                    <label for="price">{{$book->price}}</label>
                </td>
                <td>
                    <label for="price">{{$book->author->name}}</label>
                </td>
                <td>
                    <a href="{{route('books.edit',$book->id)}}" class="btn btn-primary btn-sm ">Edit</a>
                </td>

                <td>

                    {{-- <a href="{{route('books.delete', $book->id)}}" method='DELETE'
                        class="btn btn-danger btn-sm">Delete</a> --}}


                    {{ Form::open(['route' => ['books.delete',$book->id], 'method'=>'DELETE']) }}

                    {{ Form::submit('DELETE',['class' => 'btn btn-danger btn-sm']) }}

                    {{ Form::close() }}


                </td>
            </tr>
            @endforeach
            @else
            <tr>
                <th colspan="4" class="text-center">No product published</th>
            </tr>
            @endif
        </tbody>
    </table>
</div>
        </div>
    </div>
</div>



    @endsection
