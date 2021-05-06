@extends('layout')
@section('page_title',' Recherche produits | K-osmétik')

@section('styles')
    <link rel="stylesheet" href="/css/front.css">
@endsection

@section('content')
<section class="bg-white py-5 results">
    <h2 class="fw-bold my-4 results-title">Résultats de recherche pour <span class="fw-normal colored search-tag">mixa crème</span> (11)</h2>

    <div class="py-5 result">
        <a href="#" class="d-flex align-items-center fw-bold text-decoration-none">
            <img src="/img/creme-mixa.png" alt="Crème de soin mixa">
            <p class="mx-4">
                Crème de soin mixa - 5000 FCFA
            </p>
            <p class="mx-4">
                <span class="colored">Soins esthétiques</span> - Soins visages & corps
            </p>
        </a>
    </div>
    <div class="my-5 result">
        <a href="#" class="d-flex align-items-center fw-bold text-decoration-none">
            <img src="/img/creme-mixa.png" alt="Crème de soin mixa">
            <p class="mx-4">
                Crème de soin mixa - 5000 FCFA
            </p>
            <p class="mx-4">
                <span class="colored">Soins esthétiques</span> - Soins visages & corps
            </p>
        </a>
    </div>

</section>

@endsection