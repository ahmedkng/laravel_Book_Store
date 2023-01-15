@extends('main')

@section('content')
<div class="container-fluid">

    <!-- Page Heading -->


    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <div class="row">
                <div class="col">
                    <a href="{{route('all.users')}}" class='btn btn-primary'>Back</a>
                </div>
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Edit user</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-3">
                <div class="display-img text-center p-4">
                    <img src="{{$user->getAvatarUrlAttribute($user->avatar)}}" alt="">
                </div>
            </div>
            <div class="col-lg-9">
                <div class="card-body">
                    <form action="{{ route('user.update' , $user->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" class="form-control" value="{{ $user->name }}">
                        </div>

                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" class="form-control" value="{{ $user->email }}">
                        </div>

                      
                            <div class="form-group">
                                <label for="address">Address</label>
                                <input type="text" name="address" class="form-control" value="{{ $user->address}}">
                            </div>
                    
                     
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" class="form-control" value="{{ $user->phone}}">
                        </div>
                       
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input id="password" type="password" class="form-control" name="password"
                                autocomplete="new-password">

                        </div>

                        <div class="form-group">
                            <label for="password-confirm ">Confirm Password</label>


                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">

                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select class="form-control input-sm " name="role" id="role">
                                <option value="admin" {{ $user->role == 'admin' ? 'selected' : '' }}>
                                admin
                                </option>
                                <option value="user" {{ $user->role == 'user'? 'selected' : '' }}>
                                    user
                                </option>
                            </select>
                        </div>
                        <div class="form-group mb-3">
                            <label for="avatar">Image</label>
                            <input type="file" name="avatar" class="form-control">
                        </div>
                        <div class="form-group text-center">
                            <button class="btn btn-success" type="submit" style="width: 70%;margin-top: 50px;">

                                Edit User</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
@endsection
