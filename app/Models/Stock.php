<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $connection = 'pgsql';
    protected $fillable = ['product', 'quantity', 'serialnum', 'price', 'category'];
}
