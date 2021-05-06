<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;

class UserController extends Controller
{
    public function index()
    {
        $categories = Category::all();

        // dd($categories);

        return view('general.welcome')
            ->with([
                'categories' => $categories,
            ]);
    }

    public function productsByCat($catID = null)
    {
        if ($catID == null)
            $presentCat = Category::first();
        else
            $presentCat = Category::find($catID);



        $categories = Category::all();
        $products = Product::where('category_id', $presentCat->id)->get()->toArray();

        return view('general.products')->with([
            'presentCategory' => [
                'id' => $presentCat->id,
                'name' => $presentCat->name,
                'products' => $products,
            ],
            'categories' => $categories
        ]);
    }

    public function detailsProduct($productID)
    {
        $product = Product::find($productID);
        if ($product == null)
            return view('general.detail')
                ->with('error',true);

        return view('general.detail')
            ->with([
                'product' => $product,
                'category' => Category::select('name')->where('id', $product->category_id),
            ]);
    }

    public function search($tag){

    }
}
