@extends('layout')
@section('page_title','Catégoris des produits | K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
<h1 class="fs-1 text-center fw-bold my-5">Catégories</h1>
<section id="cat-options" class="bg-white container-fluid px-0 py-3">
    <section class="mb-5 p-5 position-relative categories">

        <div class="position-absolute modal-btns d-flex justify-content-center align-items-center">
            <button class="mx-3 position-relative btn btn-primary fs-4 adding-btn-field" data-bs-toggle="modal" data-bs-target="#adding-category">Ajouter une catégorie<i class="fas fa-plus position-absolute rounded-circle p-1"></i>
            </button>
        </div>

        <div class="modal fade" id="adding-category" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder colored" id="modal-title">Ajouter une catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('adding_category')}}" autocomplete="off">
                        @csrf
                        <div class="modal-body p-5">
                            <label for="adding-cat">Nom de la catégorie</label>
                            <input type="text" name="cat_name" id="adding-cat" class="form-control fs-3">
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-primary fs-3">Enregistrer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
        <div class="modal fade" id="modify-category" tabindex="-1" aria-labelledby="modal-title" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title fs-1 fw-bolder colored" id="modal-title">Modifier catégorie</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form method="POST" action="{{route('modify_category')}}" autocomplete="off">
                        @csrf
                        <div class="modal-body p-5">
                            <label for="modify-cat">Nom de la catégorie</label>
                            <input type="text" name="cat_name" id="modify-cat-name" class="form-control fs-3">
                            <input type="text" name="cat_id" id="modify-cat-id" class="form-control fs-3" hidden>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary fs-3" data-bs-dismiss="modal">Fermer</button>
                            <button type="submit" class="btn btn-danger fs-3" formaction="{{route('delete_cat')}}">Supprimer</button>
                            <button type="submit" class="btn btn-primary fs-3">Enregistrer</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>

            <div class="d-flex justify-content-center align-items-center flex-wrap p-3">
                @if(count($categories)==0)
                <div class="my-5 w-100 text-center fs-1">
                    Aucune catégorie enregistrée <i class="fas fa-sad-tear"></i>
                </div>
                @else
                    @foreach($categories as $categorie)
                    <button class="text-decoration-none m-5 outline-none border-0 bg-transparent">
                        <div data-bs-toggle="modal" data-id="{{$categorie['id']}}" data-bs-target="#modify-category" class="card-cat cursor-pointer d-flex justify-content-center align-items-center fw-bolder colored ">
                            {{$categorie['name']}}
                        </div>
                    </button>
                    @endforeach
                @endif
            </div>

    </section>
</section>
@endsection

@section('scripts')
<script src="/js/admin.js"></script>
@endsection