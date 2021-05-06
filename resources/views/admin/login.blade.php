@extends('layout')
@section('page_title','Connexion | K-osmétik')
@section('styles')
<link rel="stylesheet" href="/css/admin.css">
@endsection

@section('content')
<section class="d-flex justify-content-center align-items-center login">
    <form method="POST" class="bg-white my-5 p-5">
        @csrf
        <h2 class="fw-bold fs-2 colored">Connection</h2>
        <div class="form-group my-5">
            <label class="fw-bold cursor-pointer" for="username">Nom d'utilisateur</label>
            <input name="username" id="username" type="text" class="form-control fs-3">
        </div>
        <div class="form-group my-5 position-relative">
            <label class="fw-bold cursor-pointer" for="password">Mot de passe</label>
            <input id="password" name="password" type="password" class="form-control fs-3">
        </div>
        <div class="form-group my-5 position-relative">
            <label class="fw-bold cursor-pointer" for="password_confirmation">Confirmation de passe</label>
            <input name="password_confirmation" id="password_confirmation" type="password" class="form-control fs-3">
        </div>

        <div class="d-flex justify-content-evenly btns mt-5">
            <button type="reset" class="btn btn-warning fs-3 mx-2">Se connecter</button>
            <button type="submit" class="btn btn-primary fs-3 mx-2">Se connecter</button>
        </div>
    </form>
</section>
@endsection