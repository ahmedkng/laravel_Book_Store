<?php

namespace App\Http\Controllers\Auth;
use App\Http\Controllers\Controller;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class GoogleController extends Controller
{
public function redirectToGoogle()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        try {
            $user =  Socialite::driver('google')->user();

$finduser = User::where('email', $user->email)->first();
          //  $finduser = User::where('email', $user->email)->first();
            if($finduser){
                Auth::login($finduser);
                return redirect('/');
            }else{
                //user is not yet created, so create first
                $newUser = User::create([
                   'google_id'=> $user->id,
                   'name' => $user->name,
                   'email' => $user->email,
                   'avatar'=>$user->getAvatar(),
                   'password' => encrypt(''),

                ]);
                $newUser->save();

                Auth::login($newUser);
                // go to the dashboard
                return redirect('/');
           }
            //catch exceptions
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
