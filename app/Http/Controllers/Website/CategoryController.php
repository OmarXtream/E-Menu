<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\product;
use Illuminate\Http\Request;

class CategoryControllar extends Controller
{
    public function show(Category $category)
    {
        $category = $category->load('children');
        $products = Products::where('category_id' , $category->id)->paginate(15);
        
        return view('index' , compact('category','products'));
    }
}
