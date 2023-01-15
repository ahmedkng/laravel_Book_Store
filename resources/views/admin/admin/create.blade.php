@extends('main') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">


                    <div class="row">
    <div class="col-md-5">
        <a href="{{route('all.admins')}}" class='btn btn-primary'>Back</a>
    </div>
    <div class="col">
        <h1 class="h4 mb-2 text-gray-800">Create New Admin</h1>
    </div>

</div>
                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('admin.store') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror"
                                    name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                    name="email" value="{{ old('email') }}" required autocomplete="email">
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password"
                                    class="form-control @error('password') is-invalid @enderror" name="password"
                                    required autocomplete="new-password"> @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">Confirm
                                Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control"
                                    name="password_confirmation" required autocomplete="new-password">
                            </div>
                        </div>


                         <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">
                                Role</label>

                            <div class="col-md-6">
                               <select class="form-control input-sm "  name="role" id="role">
                                <option value="admin" >Admin </option>

                            </select>
                            </div>
                        </div>


                        <div class="row mb-3">
                            {{-- <label for="avatar">Image</label> --}}
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">Image
                                </label>





                            <div class="col-md-6">
                                <input type="file" name="avatar" class="form-control"> {{-- <input type="file"
                                    class="form-control" name="avatar"> --}} @error('avatar')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span> @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Create
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
