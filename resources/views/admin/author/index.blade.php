@extends('main')

@section('content')
<div class="container-fluid">


    <div class="my-2 px-1">
        <div class="row">

            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <div class="row">
                        <div class="col-md-1">
                            <a href="{{route('home')}}" class='btn btn-primary'>Back</a>
                        </div>
                        <div class='col-md-4'>
                            <a href="{{route('author.create')}}" class="btn btn-primary  ">

                                Add Author
                            </a>
                        </div>
                        <div class="col">
                            <h1 class="h3 mb-2 text-gray-800">Authors List</h1>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @if($authors->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>address</th>
                                    <th>phone</th>
                                    <th>Total Books</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($authors as $author)
                                <tr>
                                    <td>
                                        <div class='row' style='display: inline-flex;'>
                                            <div class="col">
                                                <form method="POST" action="{{ route('author.delete' , $author->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}
                                                    <div class="form-group">
                                                        <input type="submit" onclick="return confirm('User will delete permanently! Are you sure to delete??')"
                                                            class="btn btn-sm btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col">
                                                <a href="{{ route('author.edit' , $author->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><img src="{{$user->getAvatarUrlAttribute($author->avatar)}}" alt="" style="border-radius: 100%;vertical-align: middle;
                                        width: 100px;
                                        height: 100px;"></td>
                                    <td>{{$author->name}}</td>

                                    <td>{{$author->address ?$author->address :'No Address' }}</td>
                                    <td>{{$author->phone ?$author->phone :'No Phone' }}</td>
                                    <td><a href='{{ route('author.books' , $author->id) }}'>{{$author->totalBook($author->id)->count() }}</a></td>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    @endif
                </div>
            </div>

        </div>
        @endsection
