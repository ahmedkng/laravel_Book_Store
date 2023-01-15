@extends('main') @section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">

                    <div class="row">
                        <div class="col-md-5">
                            <a href="{{route('all.authors')}}" class='btn btn-primary'>Back</a>
                        </div>
                        <div class="col">
                            <h4> Create New Author</h4>
                        </div>
                    </div>

                </div>

                <div class="card-body">
                    <form method="POST" action="{{ route('author.store') }}" enctype="multipart/form-data">
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
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6"> <input id="phone" type="text" class="form-control" name="phone">
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6"> <input id="address" type="text" class="form-control" name="address">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="avatar" class="col-md-4 col-form-label text-md-end">Im
                            </label>
                            <div class="col-md-6">
                                <input type="file" name="avatar" class="form-control">
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
