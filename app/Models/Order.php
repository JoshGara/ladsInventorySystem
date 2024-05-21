<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

class Order extends Eloquent

{
    protected $connection = 'mongodb'; 
    use HasFactory;
    
    protected $fillable = ['product', 'orderno', 'billno', 'sold'];

   
   
}
