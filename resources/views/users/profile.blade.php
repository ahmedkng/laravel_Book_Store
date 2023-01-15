@extends('main')

@section('content')
<div class="container">
    <h4 class="my-4 p-3 bg-light">Profile</h4>
    <div class="row">
        <div class="col-lg-2">

            <div class="user-avatar mr-3">
                <img src="{{ $user->getAvatarUrlAttribute($user->avatar) }}" alt="" style="border-radius: 30%;">
            </div>
        </div>
        <div class="col-lg-7">
            <div class="card card-body ">
                <form method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf

                    

                    <div class="row mb-3">


                           <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                        <div class="col-md-8">
                            <input id="name" type="text" value="{{ $user->name }}" class="form-control" name="name">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address')
                            }}</label>

                        <div class="col-md-8">
                            <input id="email" type="email" class="form-control"  disabled name="email" value="{{ $user->email }}"
                                required autocomplete="email">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="old_password" class="col-md-4 col-form-label text-md-end">Old Password</label>

                        <div class="col-md-8">
                            <input id="old_password" type="password" class="form-control" name="old_password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password" class="col-md-4 col-form-label text-md-end">Password</label>

                        <div class="col-md-8">
                            <input id="password" type="password" class="form-control" name="password"
                                autocomplete="new-password">
                        </div>
                    </div>

                    <div class="row mb-3">
                        <label for="password-confirm" class="col-md-4 col-form-label text-md-end ">Confirm Password</label>

                        <div class="col-md-8">
                            <input id="password-confirm" type="password" class="form-control"
                                name="password_confirmation" autocomplete="new-password">
                        </div>
                    </div>


                    <div class="row mb-0">
                        <div class="col-md-6 offset-md-4">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Update Profile') }}
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
