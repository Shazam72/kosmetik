<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class AdminController extends UserController
{
    public function index()
    {
        $categories = Category::all()->toArray();

        $categoriesProducts = array_map(function ($cat) {
            $products = Product::where('category_id', $cat['id'])->get()->toArray();

            return [
                "id" => $cat['id'],
                "name" => $cat['name'],
                'products' => $products,
            ];
        }, $categories);
        return view('admin.home')
            ->with([
                'categories' => $categories,
                'catProducts'=>$categoriesProducts
            ]);
    }


    public function login()
    {

        request()->validate([
            'username' => ['bail', 'required', 'string'],
            'password' => ['required', 'min:5'],
            'password_confirmation' => ['required'],
        ]);

        $login = Auth::attempt([
            'username' => request('username'),
            'password' => request('password'),
        ]);

        if (!$login)
            return redirect()->back()->withErrors('Vos identifiants sont incorrects');

        return redirect()->route('admin_home');
    }

    public function addCategory()
    {
        request()->validate([
            'cat_name' => ['required', 'string']
        ]);

        $cat = Category::updateOrCreate([
            'name' => request('cat_name')
        ]);

        return redirect()
            ->back()
            ->with('success', "La catégorie << $cat->name >> a été ajoutée avec succès");
    }

    public function delCategory()
    {
        request()->validate([
            'cat_id' => ['required', 'integer']
        ]);

        Category::find(request('cat_id'))
            ->destroy();
    }

    public function addProduct()
    {
        request()->validate([
            'subcat_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric']
        ]);

        Product::updateOrCreate([
            [
                'name' => request('name'),
                'price' => request('price'),
                'subcategory_id' => request('subcat_id'),
            ],
            ['description' => request('description')]
        ]);

        return redirect()->back()->with('success', 'Ce produit a été enregistré avec succès');
    }

    public function delProduct()
    {
        request()->validate([
            'product_id' => ['required', 'integer']
        ]);

        Product::find(request('product_id'))->destroy();

        return redirect()->back()->with('success', 'Le produit a été suprimé');
    }

    public function getCategoriesInfos()
    {
        $categories = Category::all()->toArray();

        if (count($categories) != 0) {
            $categories = array_map(function ($categorie) {
                return [
                    'id' => $categorie['id'],
                    'name' => $categorie['name'],
                ];
            }, $categories);
        }



        return view('admin.category')->with([
            'categories' => $categories
        ]);
    }


    public function disconnect()
    {
        Auth::logout();

        return route('welcome');
    }
}
