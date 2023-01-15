<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
class CustomLogoutController extends Controller
{
    
    public function signOut() {
        Session::flush();
        Auth::logout();
        return Redirect('/');
    }
}