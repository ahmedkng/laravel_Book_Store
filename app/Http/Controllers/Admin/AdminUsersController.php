<?php

namespace App\Http\Controllers\Admin;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Session;
class AdminUsersController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
  $users = User::where('role', 'user')->get();

    return view('admin.user.index')->withUsers($users);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('admin.user.create');
    }



    /**
    * Store a newly created resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @return \Illuminate\Http\Response
    */
    public function store(Request $request)
    {
     $this->validate($request, [
    'name' => ['required', 'string', 'max:255'],
    'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
    'password' => ['required', 'string', 'min:8', 'confirmed'],
    'avatar'=> ['required'],
    ]);

    $avatar = Storage::disk('public')->put('avatar', request()->avatar);

       $user =  User::create([
            'name' => $request->name,
            'email' => $request-> email,
            'password' =>Hash::make($request->password),
             'avatar' => $avatar
        ]);

$user->save();
        Session::flash('success', 'user has been saved');

       return redirect()->route('all.users');
    }


    public function edit($id)
    {
    $user = User::findOrFail($id);


    return view('admin.user.edit')->withUser($user);
    }
     public function update(Request $request ,$id)
     {

        $user = User::findOrfail($id);


  $this->validate($request, [
        'name' => ['required', 'string', 'max:255'],
        'email' => ['required', 'string', 'email', 'max:255'],
        ]);

    if($request->avatar != null)
    {
        $this->validate($request, [
        'avatar'=> ['required'],
        ]);
    $avatar = Storage::disk('public')->put('avatar', request()->avatar);
    $user->avatar = $avatar;
}

if($request->password != null ){
$this->validate($request, [
'password' => ['required', 'string', 'min:8', 'confirmed'],
]);
$user->password = Hash::make($request->password);
}

if($request->address != null){
$this->validate($request, [
'address' => ['required', 'string','max:13']
]);
$user->address = $request->address;
 }

if($request->phone != null){
$this->validate($request, [
'phone' => ['required', 'string','max:13']
]);
$user->phone = $request->phone;
}
$user->name = $request->name;
$user->email = $request-> email;
$user->role = $request->role;
$user->save();


     Session::flash('success', 'user has been updated');
     return redirect()->route('all.users');
     }


    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    $user = User::findOrfail($id);


    $user->delete();
    return redirect()->back()
    ->with('alert_message', 'User deleted successfully');
    }
    }