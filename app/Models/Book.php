<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    use HasFactory;

     protected $fillable = [
     'title', 'image', 'price', 'description','author_id'
     ];

 
    public function orders()
    {
    return $this-> belongsToMany( Order::class);
    }

     public function author()
     {
     return $this->belongsTo( Authors::class );
     }

   
   
   }