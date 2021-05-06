@extends('layout')
@section('page_title','Bienvenue à K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/front.css">
@endsection


@section('content')
<section class="container-fluid banner">
    <div class="row inner-banner">
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 d-flex flex-column justify-content-center text">
            <h2 class="fw-bold text-center">Découvrez l'exclusivité chez <span class='logo-title colored'> <br> K-osmétik</span></h2>
            <h2 class="fw-bold text-center fs-1">Des produits de qualités à des prix abordables</h2>
        </div>
        <div class="col-xs-12 my-xs-5 col-sm-12 col-md-6 col-lg-6 position-relative p-4 images d-flex flex-column justify-content-center text-center">
            <img src="/img/creme-anti-age.png" alt="Crème anti-âge Etoile">
            <img src="/img/demaquillant.png" alt="Coton démaquillant">
        </div>
    </div>
</section>
<section class="container-fluid bg-white categories">
    <h3 class="text-center fw-bold section-title colored">Catégories</h3>
    <div class="d-flex justify-content-center align-items-center flex-wrap p-3">
        @if(count($categories)==0)
        <div class="my-5 w-100 text-center fs-1">
            Aucune catégorie enregistrée <i class="fas fa-sad-tear"></i>
        </div>
        @else
        @foreach($categories as $categorie)
        <a href="{{ route('products_byCat',['catID'=>$categorie->id]) }}" class="text-decoration-none m-5">
            <div class="card-cat d-flex justify-content-center align-items-center fw-bolder colored">
                {{$categorie->name}}
            </div>
        </a>
        @endforeach
        @endif
    </div>
</section>
@endsection


@section('scripts')
@endsection