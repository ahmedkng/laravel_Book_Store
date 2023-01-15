<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

protected $fillable = ['user_id','books_quantity','order_status','order_address','order_phone'];


public function user()
{
return $this->belongsTo(User::class);
}

 public function book()
 {
 return $this->belongsToMany(Book::class);
 }


}