@extends('layout')
@section('page_title','Mon compte | K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/admin.css">
@endsection


@section('sidebar')
@include('admin.sidebar')
@endsection

@section('content')
<section class="d-flex justify-content-center align-items-center">
    <form action="" class="bg-white my-5 p-5 w-50" method="post">
    <h3 class="colored fw-bold">Modifification du compte</h3>
    <div class="inner-form modify-account">
            <div class="my-5 form-group">
                <label for="username">Nom d'utilisateur</label>
                <input id="username" name="username" type="text" class="form-control fs-3">
            </div>
            <div class="my-5 form-group">
                <label for="password">Mot de passe</label>
                <input id="password" name="password" type="text" class="form-control fs-3">
            </div>
            <div class="my-5 form-group">
                <label for="password_confirmation">Confirmation du mot de passe</label>
                <input id="password_confirmation" name="password_confirmation" type="text" class="form-control fs-3">
            </div>
        </div>
        <div class="my-3 d-flex justify-content-evenly align-iitems-center ">
            <button class="btn btn-warning fs-4">Effacer</button>
            <button class="btn btn-primary fs-4">Enregistrer</button>
        </div>
    </form>
</section>
@endsection

@section('scripts')
<script src="/js/admin.js"></script>
@endsection