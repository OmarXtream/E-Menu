<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function show(Product $product)
    {
       return view('index' , compact('product'));
    }
}
