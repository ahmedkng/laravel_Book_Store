@extends('main')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h3>All Books</h3>
        </div>
    

    </div>

    <div class="row" style="margin-top: 30px">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Book Id</th>
                    <th scope="col">Title</th>
                    <th scope="col">Image</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
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


@endsection