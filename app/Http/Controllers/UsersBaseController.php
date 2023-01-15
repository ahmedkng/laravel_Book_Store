<?php

namespace App\Http\Controllers;
use Session;
use App\Models\User;
use App\Models\Book;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\OrderDetail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class UsersBaseController extends Controller
{

    public function profile()
    {
        $user = Auth::user();
        $avatar = $user->getAvatarUrlAttribute($user->avatar);
    return view('users.profile')->withUser($user);
    }

     public function profileUpdate(Request $request)
    {
         $user =Auth::user();
         if($request->password != null ||$request->old_password != null )
         {
            $this->validate($request, [
            'name' => ['string', 'max:255'],
            'old_password' => ['string','min:8'],
            'password' => ['min:8','confirmed'],
            ]);
            if (Hash::check($request->old_password, $user->password)) {
                   $user->name = $request->name;
                   $user->password= Hash::make($request->password);
                   $user->save();
                   Session::flash('success', 'User has been Update');
                   return redirect()->route('user.profile');  // response()->json(['success'=>true,'message'=>'success', 'data' => $user]);
            }
        Session::flash('error', 'Login Fail, pls check password');
        return redirect()->route('user.profile');
        }
        $this->validate($request, [
        'name' => ['string', 'max:255'],
        ]);

        $user->name = $request->name;
        $user->save();


        $avatar = $user->getAvatarUrlAttribute($user->avatar);
   return redirect()->route('user.profile');
    }




    public function create_order($id)
    {
    $user =Auth::user();
     $book = Book::findOrFail($id);
    return view('users.create_order')->withBook($book)->withUser($user);
    }


public function add_to_orders(Request $request , $id)
{
    $this->validate($request, [
    'address' => ['required','string'],
    'phone' => ['required','string','max:12'],
    ]);

    $user_id = Auth::user()->id;
    $user =User::findOrfail($user_id) ;
    $book = Book::findOrfail($id);
    $order = Order::create([
    'user_id' => $user_id,
    'order_address'=>$request->address,
    'order_phone'=>$request->phone,
    'books_quantity'=> $request->qty,
    ]);
  $order->save();
  $user->phone =$request->phone;
  $user->address =$request->address;
  $user->save();
  $order->book()->sync($book);


  Session::flash('success', 'order has been create');
    return redirect()->route('home');
}


       public function myOrders()
    {
        $userId = Auth::user()->id;
        $orders = Order::where('user_id', $userId)->get();
       return view('users.my_orders')->withOrders($orders);
    }

public function allOrders()
{
$orders = Order::all();
return view('admin.orders.all-orders')->withOrders($orders);
}

    public function order_details($id)
    {
        $order = Order::findOrFail($id);
        return view('users.order-details')->withOrder($order);
    }

}
