<?php

namespace Product;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name','price','stock', 'category_name'];
}