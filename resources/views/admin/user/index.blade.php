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
                            <a href="{{route('user.create')}}" class="btn btn-primary ">
                                Add user
                            </a>
                        </div>
                        <div class="col">
                            <h1 class="h3 mb-2 text-gray-800">Users List</h1>
                        </div>

                    </div>
                </div>
                <div class="card-body">
                    @if($users->count())
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>Action</th>
                                    <th>Photo</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>address</th>
                                    <th>phone</th>
                                    <th>Total orders</th>
                                    <th>Role</th>
                                </tr>
                            </thead>

                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>
                                        <div class='row'>
                                            <div class="col-md-6">
                                             <form method="POST" action="{{ route('user.delete' , $user->id) }}">
                                                {{ csrf_field() }}
                                                {{ method_field('DELETE') }}

                                                <div class="form-group">
                                                    <input type="submit" onclick="return confirm('User will delete permanently! Are you sure to delete??')"
                                                        class="btn btn-sm btn-danger" value="Delete">
                                                </div>
                                            </form>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('user.edit' , $user->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>

                                    </td>
                                    <td><img src="{{$user->getAvatarUrlAttribute($user->avatar)}}" alt="" style="border-radius: 100%;vertical-align: middle;
                                        width: 100px;
                                        height: 100px;"></td>
                                    <td>{{$user->name}}</td>
                                    <td>{{$user->email}}</td>
                                    <td>{{$user->address ?$user->address :'No Address' }}</td>
                                    <td>{{$user->phone ?$user->phone :'No Phone' }}</td>
                                    <td>{{$user->orders->count()}}</td>
                                    <td>{{$user->role}}
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
