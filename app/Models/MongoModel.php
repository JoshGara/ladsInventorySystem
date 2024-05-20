<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MongoModel extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'inventory_mongodb';
    protected $fillable = ['product', 'orderno', 'billno', 'sold'];
    use HasFactory;
}
