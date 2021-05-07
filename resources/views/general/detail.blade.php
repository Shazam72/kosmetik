@extends('layout')
@section('styles')
<link rel="stylesheet" href="/css/front.css">
@endsection
@section('page_title','Détails produits | K-osmétik')

@section('content')
<a href="{{url()->previous()}}" class="btn btn-primary rounded-pill fs-3"><i class="fas fa-arrow-left"></i> Retour</a>
<section class="container-fluid d-flex justify-content-center align-items-center">
    @if(isset($error))
    <div class="fs-2 my-5 bg-white w-100 text-center p-5">
        Identifiant de produit introuvable !
        <p class="fs-3 mt-5">Cet indendifiant de produit étant introuvable, le produit démandé n'existe donc pas</p>
        <p class="fs-3 mt-5">Vous pourrez trouvez des produits valides et existants en cliquant ci-dessous <i class="fas fa-hand"></i><br>
            <a href="{{route('products')}}" class="btn btn-primary fs-3">Cliquez-ici</a>
        </p>
    </div>
    @else
    <div class="row bg-white p-5 detail">
        <h3 class="mb-5">{{$product->name}} - {{$product->price}} FCFA</h3>
        <div class="col-md-5 col-lg-6 col-sm-12 col-xs-6 img text-center">
            <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}">
        </div>
        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-6">
            <span class="fw-bold">Description:</span>
            <p class="px-3 d-inline-block">
                {{$product->description}}
            </p>
        </div>
        @if(auth()->check())
        <div class="col-md-1 col-lg-1 d-flex justify-content-between align-items-center">
            <button data-bs-toggle="modal" data-bs-target="#modify" class="btn btn-primary fs-4">
                <i class="fas fa-pen"></i>
            </button>
            <div class="modal fade" id="modify" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title fs-1 fw-bolder colored" id="modal-title">Ajouter un produit</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <form action="{{route('modify_product')}}" enctype="multipart/form-data" method="POST">
                            @csrf
                            <input type="hidden" name="productID" value="{{$product->id}}">
                            <div class="modal-body d-flex flex-wrap p-5">
                                <div class="">
                                    <div class="form-group my-5">
                                        <label class="fw-bold" for="product_name">Nom du produit</label>
                                        <input type="text" value="{{$product->name}}" name="product_name" id="product_name" class="form-control fs-2">
                                    </div>
                                    <div class="form-group my-5">
                                        <label class="fw-bold" for="price">Prix</label>
                                        <input name="price" id="price" value="{{$product->price}}" type="text" class="form-control fs-2">
                                    </div>
                                    <div class="form-group my-5 d-flex">
                                        <select name="category" id="category">
                                            <option value="{{$product->category->id}}">{{$product->category->name}}</option>
                                            @if(count($categories)!=0)
                                            @foreach($categories as $category)
                                            <option value="{{$category['id']}}">{{$category['name']}}</option>
                                            @endforeach
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group my-5 d-flex">
                                        <label class="fw-bold" for="description">Description: &nbsp;</label>
                                        <textarea id="description" name="description" cols="30" rows="5">
                                        {{$product->description}}
                                        </textarea>
                                    </div>
                                </div>
                                <div class="">
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label">Image du produit</label>
                                        <input class="form-control" value="{{asset('storage/'.$product->image)}}" name="image" type="file" id="formFileMd">
                                        <img src="{{asset('storage/'.$product->image)}}" alt="" id="preview" style="display:block; width:30rem;height:auto;">
                                    </div>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Fermer</button>
                                <button type="submit" class="btn btn-primary fs-3">Modifier le produit</button>
                            </div>
                        </form>

                    </div>
                </div>
            </div>
            <button data-target="{{route('modify_product',['productID'=>$product->id])}}" class="delete btn btn-danger fs-4">
                <i class="fas fa-trash"></i>
            </button>
        </div>
        @endif
    </div>
    @endif
</section>
@endsection


@section('scripts')
<script src="/js/admin.js"></script>
@endsection