@extends('main')

@section('content')
    <div class="container-fluid">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
              <div class="row">
                <div class="col-md-1">
                    <a href="{{route('home')}}" class='btn btn-primary'>Back</a>
                </div>
                <div class='col-md-4'>
                   <a href="{{route('admin.create')}}" class="btn btn-primary">
                        Add admin
                    </a>
                </div>
                <div class="col">
                    <h1 class="h3 mb-2 text-gray-800">Admins List</h1>
                </div>

            </div>
            </div>
            <div class="card-body">
                @if($admins->count())
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
                            @foreach($admins as $admin)
                                <tr>
                                    <td>
                                        <div class='row'>
                                            <div class="col-md-6">
                                                <form method="POST" action="{{ route('admin.delete' , $admin->id) }}">
                                                    {{ csrf_field() }}
                                                    {{ method_field('DELETE') }}

                                                    <div class="form-group">
                                                        <input type="submit" onclick="return confirm('User will delete permanently! Are you sure to delete??')"
                                                            class="btn btn-sm btn-danger" value="Delete">
                                                    </div>
                                                </form>
                                            </div>
                                            <div class="col-md-6">
                                                <a href="{{ route('admin.edit' , $admin->id) }}" class="btn btn-primary btn-sm">Edit</a>
                                            </div>
                                        </div>
                                    </td>
                                    <td><img src="{{$admin->getAvatarUrlAttribute($admin->avatar)}}" alt="" style="border-radius: 100%;vertical-align: middle;
                                        width: 100px;
                                        height: 100px;"></td>
                                    <td>{{$admin->name}}</td>
                                    <td>{{$admin->email}}</td>
                                    <td>{{$admin->address ?$admin->address :'No Address' }}</td>
                                    <td>{{$admin->phone?$admin->phone:'No Phone'}} </td>
                                    <td>{{$admin->orders->count()}}</td>
                                    <td>{{$admin->role}}
                                        {{-- <select class="form-control input-sm "style='background-color: turquoise;' name="role" id="role">
                                            <option value="{{$admin->role}}"  {{ $admin->role == $admin->role  ? 'selected' : ''}} >admin </option>
                                        <option value="{{$admin->role}}"  {{ $admin->role == $admin->role  ? 'selected' : ''}}>admin </option>
                                        </select> --}}
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
