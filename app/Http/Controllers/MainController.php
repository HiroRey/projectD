<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsFilterRequest;
use App\Models\Category;
use App\Models\Product;
use Barryvdh\Debugbar\Twig\Extension\Debug;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Log;

class MainController extends Controller
{
    public function index(ProductsFilterRequest $request)
    {
        $queryString = Product::with('category');
        if($request->filled('price_from')) {
            $queryString->where('price', '>=', $request->price_from);
        }
        if($request->filled('price_to')) {
            $queryString->where('price', '<=', $request->price_to);
        }

        foreach (['new', 'hit', 'recommend'] as $item) {
            if($request->has($item)) {
                $queryString->$item();
            }
        }

        $products = $queryString->paginate(9)->withPath("?" . $request->getQueryString());

        return view('index', compact('products'));
    }
    public function categories()
    {
       $elements = Category::get();
        return view('categories', compact('elements'));
    }
    public function product($category, $product)
    {
        $product = Product::byCode($product)->withTrashed()->first();

        return view('product', ['product' => $product, 'category' => $category]);
    }
    public function category($code)
    {

    $obj = Category::where('code', $code)->first();

        return view('category', ['category' => $obj]);
    }

    public function lang($lang)
    {
        $availableLocales = ['ru', 'en'];
        if (!in_array($lang, $availableLocales)) {
            $locale = config('app.locale');
        }

        session(['lang' => $lang]);
        App::setLocale($lang);
        return redirect()->back();
    }
}
