<?php

namespace App\Http\Controllers\Admin;
use App\Models\Authors;
use App\Models\User;
use App\Models\Book;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;
use Session;
class AdminAuthorsController extends Controller
{
    /**
    * Display a listing of the resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
    $authors =Authors::all();
    $user = Auth::user();
    return view('admin.author.index')->withAuthors($authors)->withUser($user);
    }

    /**
    * Show the form for creating a new resource.
    *
    * @return \Illuminate\Http\Response
    */
    public function create()
    {
    return view('admin.author.create');
    }



    public function all_Books($id)
    {
        $user = Auth::user();
   $books = Authors::totalBook($id);

    return view('admin.author.books')->withBooks($books)->withUser($user);
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
    'phone' => ['required', 'string', 'max:12'],
    'address' => ['required', 'string'],
    'avatar'=> ['required'],
    ]);
    $avatar = Storage::disk('public')->put('authors', request()->avatar);
       $author =  Authors::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'address' => $request->address,
             'avatar' => $avatar
        ]);
    $author->save();
        Session::flash('success', 'Author has been create');

       return redirect()->route('all.authors');
    }



    /**
    * Display the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function show($id)
    {
    //
    }

    /**
    * Show the form for editing the specified resource.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */

public function edit($id)
{
$user = Auth::user();
$author = Authors::findOrFail($id);
return view('admin.author.edit')->withAuthor($author)->withUser($user);
}


public function update(Request $request ,$id)
{
   

$author = Authors::findOrfail($id);

$this->validate($request, [
'name' => ['required', 'string', 'max:255'],
]);

if($request->avatar != null)
{
$this->validate($request, [
'avatar'=> ['required'],
]);
$avatar = Storage::disk('public')->put('authors', request()->avatar);
$author->avatar = $avatar;
}

if($request->address != null){
$this->validate($request, [
'address' => ['required', 'string','max:13']
]);
$author->address = $request->address;
}

if($request->phone != null){
$this->validate($request, [
'phone' => ['required', 'string','max:13']
]);
$author->phone = $request->phone;
}
$author->name = $request->name;
$author->save();
Session::flash('success', 'author has been updated');
return redirect()->route('all.authors');
}

    /**
    * Remove the specified resource from storage.
    *
    * @param int $id
    * @return \Illuminate\Http\Response
    */
    public function destroy($id)
    {
    $author = Authors::findOrfail($id);
    $author->delete();

    return redirect()->back()->with('alert_message', 'author  deleted successfully');
    }
    }
