<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;
use App\Models\Book;
use App\Models\User;
use App\Models\Order;
use App\Models\Authors;
use Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
class BookController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $books =Book::all();
    $user =Auth::user();
    return view('admin.books.index')->withBooks($books)->withUser($user);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
        $authors = Authors::all();
    return view('admin.books.create')->withAuthors($authors);
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
    'title' => 'required|max:255',
    'image' => 'required|image',
    'price' => 'required',
    'author' => 'required',
    'description' => 'required'
    ]);


//if($request->hasFile('image')){
//converting image into the string
//$image = $request->image;

//$image_new_name = time().$image->getClientOriginalName();

//$image->move('uploads/books',$image_new_name);


//}

$image = Storage::disk('public')->put('image', request()->image);

    $book = Book::create([
    'title' => $request->title,
    'price' => $request->price,
    'image' => $image,
    'description' => $request->description,
    'author_id'=>$request->author
    ]);
    $book->save();

    Session::flash('success', 'Book has been created');
    return redirect()->route('books.index');

    }

    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function edit($id)
    {
    $book = Book::findOrfail($id);
$authors = Authors::all();
    return view('admin.books.edit')->withBook($book)->withAuthors($authors);
    }

    /**
    * Update the specified resource in storage.
    *
    * @param \Illuminate\Http\Request $request
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function update(Request $request, $id)
    {


    $this->validate($request, [
    'title' => 'required|max:255',
    'price' => 'required',
    'description' => 'required'
    ]);

    //find the book
    $book = Book::findOrfail($id);

    if(request()->has('image'))
    {

        $image = Storage::disk('public')->put('image', request()->image);
       $book->title = $request->title;
        $book->price = $request->price;
        $book->description = $request->description;
        $book->author_id = $request->author;
        $book->image = $image;
    }


    $book->title = $request->title;
 $book->price = $request->price;
    $book->description = $request->description;
$book->author_id = $request->author;
    $book->save();

    Session::flash('success', 'Book has been updated');
    return redirect()->route('books.index');
    }

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    $book = Book::findOrfail($id);

    if(file_exists($book->image)){
    unlink($book->image);
    }

    $book->delete();

    Session::flash('success', 'This Book has been Deleted');

    return redirect()->back();
    }

    public function home(){
        $user =Auth::user();
          $books = Book::all();
     $users = User::where('role', 'user')->get();
    $admins = User::where('role', 'admin')->get();
    $authors = Authors::all();
  $orders = Order::all();


          if($user->role === 'admin')
          {
          return view('admin.admin.dashboard')->withUsers($users)->withAdmins($admins)->withBooks($books)->withOrders($orders)->withAuthors($authors);
          }
        return view('homepage')->withBooks($books)->withUser($user);
    }


        public function book_details($id)
    {
        $user =Auth::user();
        $book= Book::findOrFail($id);
        return view('admin.books.book_details')->withBook($book)->withUser($user);
    }
 }
