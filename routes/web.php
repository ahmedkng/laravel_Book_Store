<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

////books operations
Auth::routes();

//log out
Route::get('signout', [App\Http\Controllers\CustomLogoutController::class, 'signOut'])->name('signout');
//login with google
Route::get('auth/google', [App\Http\Controllers\Auth\GoogleController::class, 'redirectToGoogle'])->name('auth.google');;
Route::get('auth/google/callback', [App\Http\Controllers\Auth\GoogleController::class, 'handleGoogleCallback']);
//login with facebook
Route::get('auth/facebook', [App\Http\Controllers\Auth\FacebookController::class,
'redirectToFacebook'])->name('auth.facebook');

Route::get('auth/facebook/callback',[App\Http\Controllers\Auth\FacebookController::class,
'handleFacebookCallback']);

Route::middleware(['auth', 'role:admin'])->group(function () {
//Route::resource('/books',App\Http\Controllers\BookController::class);
//dashboard
Route::get('/',[App\Http\Controllers\BookController::class, 'home'])->name('home');
////////////////////////books//////////////////////////
//book create
Route::get('books/create',[App\Http\Controllers\BookController::class, 'create'
])->name('books.create');
//book Index
Route::get('books',[App\Http\Controllers\BookController::class, 'index'
])->name('books.index');
//book store
Route::post('books',[App\Http\Controllers\BookController::class, 'store'
])->name('books.store');
//book Edit
Route::get('books/{book}/edit',[App\Http\Controllers\BookController::class, 'edit'
])->name('books.edit');
//book delete
Route::delete('books/{book}',[App\Http\Controllers\BookController::class,'destroy'])->name('books.delete');
// Book update
Route::post('books/{book}',[App\Http\Controllers\BookController::class, 'update'])->name('books.update');
/////////////////////////end Books///////////////

//////////////////////////orders////////////////////////////////

//all orderers
Route::get('/all_orders',[App\Http\Controllers\UsersBaseController::class , 'allOrders']
)->name('all_orders');
// orderer details
Route::get('/admin_all_orders',[App\Http\Controllers\Admin\AdminOrdersController::class , 'index']
)->name('admin_all_orders');
//order delete
Route::delete('orders/{order}',[App\Http\Controllers\Admin\AdminOrdersController::class,'destroy'])->name('order.delete');
// order update
Route::post('orders/{order}',[App\Http\Controllers\Admin\AdminOrdersController::class, 'update'])->name('orders.update');
// single order
Route::get('orders/{order}',[App\Http\Controllers\Admin\AdminOrdersController::class, 'show'
])->name('orders.show');
///////////////////////end orders///////////////////////////////////

//////////////////////////user////////////////
//allusers
Route::get('dashboard/users',[App\Http\Controllers\Admin\AdminUsersController::class, 'index'
])->name('all.users');
//user store
Route::post('dashboard/users',[App\Http\Controllers\Admin\AdminUsersController::class, 'store'
])->name('user.store');
//user create
Route::get('users/create',[App\Http\Controllers\Admin\AdminUsersController::class, 'create'
])->name('user.create');
//user Edit
Route::get('users/{user}/edit',[App\Http\Controllers\Admin\AdminUsersController::class, 'edit'
])->name('user.edit');
// User update
Route::post('users/{user}',[App\Http\Controllers\Admin\AdminUsersController::class, 'update'])->name('user.update');
//user delete
Route::delete('users/{user}',[App\Http\Controllers\Admin\AdminUsersController::class,'destroy'])->name('user.delete');
//////////////////////end User////////////////



//////////////////////////authors////////////////
//allauthors
Route::get('dashboard/authors',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'index'
])->name('all.authors');
//author store
Route::post('dashboard/authors',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'store'
])->name('author.store');
//author create
Route::get('authors/create',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'create'
])->name('author.create');
//author Edit
Route::get('authors/{author}/edit',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'edit'
])->name('author.edit');
// author update
Route::post('authors/{author}',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'update'])->name('author.update');
//author delete
Route::delete('authors/{author}',[App\Http\Controllers\Admin\AdminAuthorsController::class,'destroy'])->name('author.delete');
//author books
Route::get('authors/{author}',[App\Http\Controllers\Admin\AdminAuthorsController::class, 'all_Books'
])->name('author.books');
//////////////////////end author////////////////


//////////////admin///////////////////
//alladmins
Route::get('dashboard/admins',[App\Http\Controllers\Admin\AdminBaseController::class, 'admin'])->name('all.admins');
//admin delete
Route::delete('admins/{admin}',[App\Http\Controllers\Admin\AdminBaseController::class,'destroy'])->name('admin.delete');
//admin create
Route::get('admin/create',[App\Http\Controllers\Admin\AdminBaseController::class, 'create'
])->name('admin.create');
//admin Edit
Route::get('admins/{admin}/edit',[App\Http\Controllers\Admin\AdminBaseController::class, 'edit'
])->name('admin.edit');
//admin store
Route::post('dashboard/admins',[App\Http\Controllers\Admin\AdminBaseController::class, 'store'
])->name('admin.store');
// admin update
Route::post('admins/{admin}',[App\Http\Controllers\Admin\AdminBaseController::class, 'update'])->name('admin.update');
/////////////////////////end Admin/////////////////////////////
});



Route::group(['middleware' => 'auth'], function (){
    Route::post('/profileUpdate', [App\Http\Controllers\UsersBaseController::class
    ,'profileUpdate'])->name('profile.update');

//welcome page
Route::get('/',[App\Http\Controllers\BookController::class, 'home'])->name('home');
// single book
Route::get('create_orders/{book}',[App\Http\Controllers\UsersBaseController::class, 'create_order'
])->name('order.create');
//my profile
Route::get('/profile',[App\Http\Controllers\UsersBaseController::class, 'profile'
])->name('user.profile');
//add order
Route::post('/order_add/{book}',[App\Http\Controllers\UsersBaseController::class , 'add_to_orders']
)->name('order.add');
//my orderers
Route::get('/my_orders',[App\Http\Controllers\UsersBaseController::class , 'myOrders']
)->name('my_orders');
Route::get('/order/details/{id}', [App\Http\Controllers\UsersBaseController::class ,'order_details'])->name('order.details');
//book details
Route::get('/book/details/{id}', [App\Http\Controllers\BookController::class ,'book_details'])->name('book.details');
});