@extends('layout')
@section('page_title','Produits | K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/front.css">
@endsection


@section('content')
<nav class="container-fluid bg-white">
    <div class="d-flex justify-content-center align-items-center flex-wrap inner-navbar">
        <ul class="list-inline ">
            @foreach($categories as $categorie)
            @if($categorie->id==$presentCategory['id'])
            <li class="list-inline-item py-4 mx-3 border-down-colored active">
            @else
            <li class="list-inline-item py-4 mx-3 border-down-colored">
            @endif
                <a class="text-decoration-none colored-link cat-link text-dark" href="{{route('products_byCat',['catID'=>$categorie->id])}}">{{$categorie->name}}</a>
            </li>
            @endforeach
        </ul>
    </div>
</nav>
<section class="container-fluid news">
    <div class="row inner-news">
        <div class="col-xs-12 col-sm-12 cold-md-6 text-center col-lg-6 bg-orange img">
            <img src="/img/bebe-amour.png" alt="Bébé d'amour">
        </div>
        <div class="col-xs-12 col-sm-12 cold-md-6 col-lg-6 text fs-1">
            <p class="my-5 ">
                Avec la pommade hydratante <span class="colored text-segoe">Bébé d'amour</span>,
                les bébés sont à l'honneur
            </p>
        </div>
    </div>
</section>
<section class="container-fluid bg-white">
    @if(count($presentCategory['products'])==0)
    <div class="fs-2 py-5 text-center">Aucun produit disponible pour cette catégorie <i class="fas fa-sad-tear"></i></div>
    @else
    <h3 class="colored py-3">{{ $presentCategory['name'] }}</h3>
    <section class="products d-flex flex-wrap align-items-center">
        @foreach($presentCategory['products'] as $product)
        <div class="m-4 d-flex justify-content-center align-items-center flex-column product">
            <div class="img">
                <a href="{{route('details_products',['productID'=>$product['id']])}}" title="Cliquez pour voir les détails">
                    <img src="{{$product['image']}}" alt="{{$product['name']}}">
                </a>
            </div>
            <p class="my-2 product-info text-center">
                <span>{{$product['name']}}</span> <br>
                <span class="fw-bold">{{$product['price']}} FCFA</span>
            </p>
            <a href="{{route('details_products',['productID'=>$product['id']])}}" class="btn btn-primary fs-5">Détails du produit</a>
        </div>
        @endforeach
    </section>
    @endif
</section>
@endsection


@section('scripts')
<script src="/js/products.js" type="module"></script>
@endsection