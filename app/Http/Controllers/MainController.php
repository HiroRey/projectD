<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index()
    {
        $products = Product::all();
        return view('index', compact('products'));
    }
    public function categories()
    {
       $elements = Category::get();
        return view('categories', compact('elements'));
    }
    public function product($category, $product)
    {
        $product = Product::where('code', $product)->first();

        return view('product', ['product' => $product, 'category' => $category]);
    }
    public function category($code)
    {

    $obj = Category::where('code', $code)->first();

        return view('category', ['category' => $obj]);
    }
}
