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
        <p class="fs-3 mt-5">Vous porrez trouvez des produits valides et existants en cliquant ci-dessous <i class="fas fa-hand"></i><br>
            <a href="{{route('products')}}" class="btn btn-primary fs-3">Cliquez-ici</a>
        </p>
    </div>
    @else
    <div class="row bg-white p-5 detail">
        <h3 class="mb-5">{{$product->name}} - {{$product->price}} FCFA</h3>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-6 img text-center">
            <img src="{{$product->image}}" alt="{{$product->name}}">
        </div>
        <div class="col-md-6 col-lg-6 col-sm-12 col-xs-6">
            <span class="fw-bold">Description:</span>
            <p class="px-3 d-inline-block">
            {{$product->description}}
            </p>
        </div>
    </div>
    @endif
</section>
@endsection