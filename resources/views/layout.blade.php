<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/fa/css/all.min.css">
    <link rel="stylesheet" href="/css/layout.css">
    @if(auth()->check())
    <link rel="stylesheet" href="/css/sidebar.css">
    @endif
    @yield('styles')
    <title>@yield('page_title', 'K-osmétik')</title>
</head>

<body>
    @if(auth()->check())
    @include('admin.sidebar')
    @endif
    <div class="inner-page">
        <header>
            <div class="inner-header container d-flex justify-content-between flex-wrap align-items-center">
                <a href="/">
                    <img src="/img/logo.png" alt="K-osmétik" id="logo">
                </a>
                <div class="search-bar position-relative">
                    <form action="{{route('search')}}">
                        <input type="text" id="search-bar-input" name="query" class="p-y px-5" placeholder="Rechercher un produit...">
                        <button type="submit" class="bg-transparent border-0 outline-none position-absolute"><i class="fas fa-search"></i></button>
                    </form>
                </div>
            </div>
        </header>
        <section class="my-4" id="inner-main-section">
            @include('general.alerts')
            @yield('content')
        </section>
        <footer class="my-5">
            <div class="d-flex justify-content-center align-items-center inner-footer fw-bolder">
                <p>Retrouvez-nous sur :</p>
                <div class="">
                    <a href="#" class="mx-4 fs-1 social-link"><i class="fab fa-facebook"></i></a>
                    <a href="#" class="mx-4 fs-1 social-link"><i class="fab fa-instagram"></i></a>
                    <a href="#" class="mx-4 fs-1 social-link"><i class="fab fa-twitter"></i></a>
                </div>
            </div>
        </footer>
    </div>
    <script src="/js/jquery-3.5.1.min.js"></script>
    <script src="/js/sweetalert.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.bundle.min.js"></script>
    @yield('scripts')
</body>

</html>