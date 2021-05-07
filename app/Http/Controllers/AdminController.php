<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
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
                'catProducts' => $categoriesProducts
            ]);
    }

    public function login()
    {

        request()->validate([
            'username' => ['bail', 'required', 'string'],
            'password' => ['required',['confirmed'], 'min:5'],
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

        Category::destroy(request('cat_id'));

        return redirect()
            ->back()
            ->with('success', "Catégorie supprimée avec succès");
    }

    public function addProduct()
    {
        request()->validate([
            'category' => ['required', 'integer'],
            'product_name' => ['required', 'string'],
            'description' => ['nullable', 'string'],
            'price' => ['required', 'numeric'],
            'image'=>['required','image']
        ]);
        $image=request()->file('image');
        
        Product::create([
            
                'name' => request('product_name'),
                'price' => request('price'),
                'category_id' => request('category'),
                'image'=>$image->store('images'),
                'description' => request('description')
            
        ]);

        return redirect()
                ->back()
                ->with('success', 'Ce produit a été enregistré avec succès');
    }

    public function delProduct($productID)
    {
        if(!is_numeric($productID)){
            return redirect()
                    ->back()
                    ->with('errors', 'Identifiant du produit incorrect');
        }

        Product::destroy($productID);

        return redirect()
                ->route('admin_home')
                ->with('success', 'Le produit a été suprimé');
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

        return redirect()->route('login');
    }

    public function modifyCategory()
    {
        Category::updateOrCreate(
            ['id' => request('cat_id')],
            ['name' => request('cat_name')]
        );

        return redirect()
            ->back()
            ->with('success', "Mise à jour effectuée avec succès");
    }

    public function modifyAccount()
    {
        request()->validate([
            'username' => ['string'],
            'nom' => ['string'],
            'prenom' => ['string'],
            'password' => ['confirmed', 'min:5'],
        ]);

        $user=User::find(auth()->user()->id);
        $user->nom=request('nom');
        $user->prenom=request('prenom');
        $user->username=request('username');
        $user->password=bcrypt(request('password'));
        $user->save();

        return redirect()
                ->back()
                ->with('success', 'Vos informations ont été mises à jour');
    }

    public function accountInfos()
    {

        return view('admin.account')->with([
            'nom'=>auth()->user()->nom,
            'prenom'=>auth()->user()->prenom,
            'username'=>auth()->user()->username,
        ]);
    }

    public function modifyProducts(){
        request()->validate([
            "productID"=>['required'],
            "product_name" => ['required','string'],
            "price" => ['required','integer'],
            "category" => ['required','integer'],
            "description" => ['string'],
            "image" => ['image'],
        ]);

        $product=Product::find(request('productID'));
        $product->name=request('product_name');
        $product->price=request("price");
        $product->category=request('category');


        if (request('image')) {
            $product->image=request()->file('image')->store('images');
        }
        if (request('description')) {
            $product->description=request('description');
        }

        return redirect()
        ->back()
        ->with('success', "Produit mis à jour");
    }
}
