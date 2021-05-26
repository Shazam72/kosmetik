@extends('layout')
@section('page_title',' Recherche produits | K-osmétik')

@section('styles')
<link rel="stylesheet" href="/css/front.css">
@endsection

@section('content')
<section class="bg-white py-5 results">
    <h2 class="fw-bold my-4 results-title">Résultats de recherche pour <span class="fw-normal colored search-tag">{{$queryString}}</span> ({{count($products)}})</h2>

    @if(count($products->toArray())!=0)
    @foreach($products as $product)
    <div class="py-5 result">
        <a href="#" class="d-flex align-items-center fw-bold text-decoration-none">
            <img src="{{asset('storage/'.$product->image)}}" alt="{{$product->name}}">
            <p class="mx-4">
                {{$product->name}}- {{$product->price}} FCFA
            </p>
            <p class="mx-4">
                <span class="colored">{{$product->category->name}}</span>
            </p>
        </a>
    </div>
    @endforeach
    @else
    <div class="fs-3">Aune resultat de trouvé <i class="fas fa-sad-tear"></i></div>
    @endif

</section>

@endsection