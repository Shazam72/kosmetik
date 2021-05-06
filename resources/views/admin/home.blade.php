@extends('layout')
@section('page_title','Administration | K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<h1 class="fw-bold text-center fs-1">Produits</h1>
<div class="add-product d-flex justify-content-end">
    <button type="button" class="btn btn-primary fs-2 position-relative" data-bs-toggle="modal" data-bs-target="#adding">
        Ajouter un produit
        <i class="fas fa-plus position-absolute rounded-circle p-1"></i>
    </button>

    <div class="modal fade" id="adding" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title fs-1 fw-bolder colored" id="modal-title">Ajouter un produit</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="">
                    <div class="modal-body p-5">
                        <div class="form-group my-5">
                            <label class="fw-bold" for="product_name">Nom du produit</label>
                            <input type="text" name="product_name" id="product_name" class="form-control fs-2">
                        </div>
                        <div class="form-group my-5">
                            <label class="fw-bold" for="price">Prix</label>
                            <input name="price" id="price" type="text" class="form-control fs-2">
                        </div>
                        <div class="form-group my-5 d-flex">
                            <select name="category" id="category">
                                <option value="">Catégorie---</option>
                            </select>
                        </div>
                        <div class="form-group my-5 d-flex">
                            <select name="sub-category" id="sub-category">
                                <option value="">Sous-satégorie---</option>
                            </select>
                        </div>
                        <div class="form-group my-5 d-flex">

                        </div>
                        <div class="form-group my-5 d-flex">
                            <label class="fw-bold" for="description">Description: &nbsp;</label>
                            <textarea id="description" name="description" cols="30" rows="5"></textarea>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Fermer</button>
                        <button type="submit" class="btn btn-primary fs-3">Ajouter le produit</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
<section class="my-5 all-products">
    <section class="container-fluid bg-white">

        @if(count($catProducts)==0)
        <div class="fs-2 py-5 text-center">Aucune catégorie n'a été enregistrée <i class="fas fa-sad-tear"></i></div>
        @else
            @foreach($catProducts as $category)
                <h3 class="colored py-3 fw-bold fs-2 cursor-pointer cat-title">{{ $category['name'] }}<i class="fas fa-angle-down position-relative rounded-circle border-1 p-1"></i></h3>
                <section class="products d-flex flex-wrap align-items-center">
                    @if(count($category['products'])==0)
                        <div class="fs-2 py-5 text-center">Aucun produit pour cette catégorie <i class="fas fa-sad-tear"></i></div>
                    @else
                        @foreach($category['products'] as $product)
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
                    @endif
                </section>
            @endforeach
        @endif
    </section>
</section>
@endsection

@section('scripts')
<script src="/js/admin.js"></script>
@endsection