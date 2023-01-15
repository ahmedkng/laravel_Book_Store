<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Book;
use App\Models\Order;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
class AdminBaseController extends Controller
{
    public function admin()
    {
    $admins = User::where('role', 'admin')->get();
    return view('admin.admin.index')->withAdmins($admins);
    }
public function create()
{
return view('admin.admin.create');
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

$user = User::create([
'name' => $request->name,
'email' => $request-> email,
'password' => Hash::make($request->password),
'role' => $request->role,
'avatar' => $avatar

]);

$user->save();
Session::flash('success', 'admin has been added successfully');

return redirect()->route('all.admins');
}
  public function edit($id)
  {
    $user = Auth::user();
  $admin = User::findOrFail($id);
  return view('admin.admin.edit')->withAdmin($admin)->withUser($user);
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
     Session::flash('success', 'admin has been updated');
     return redirect()->route('all.admins');
     }
public function destroy($id)
    {
    $user = User::findOrfail($id);

    $user->delete();
    return redirect()->back()
    ->with('alert_message', 'Admin deleted successfully');
    }
}
