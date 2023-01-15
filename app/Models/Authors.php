<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Authors extends Model
{
    use HasFactory;

  protected $fillable = [
  'name', 'avatar', 'phone', 'address'
  ];
      public function book()
      {
      return $this->hasMany(Book::class);
      }


       public function totalBook($id)
      {

      $books = Book::where('author_id' , $id )->get();

return $books;
    }



}
