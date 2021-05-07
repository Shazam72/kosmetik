<input type="checkbox" id="checkbox" class="d-none">
<div class="spread-bg rounded-circle position-fixed"></div>
<label for="checkbox" class="cursor-pointer position-fixed rounded-circle label-for-checkbox">
    <span class="d-inline-block position-absolute"></span>
</label>
<div class="position-fixed" id="sidebar-menu">
    <nav  class="fs-1">
    <ul class="list-style-type-none w-100">
        <li class="my-5"><a class="text-decoration-none d-inline-block w-100 p-3" href="{{route('admin_home')}}">
        Produits
        </a>
    </li>
        <li class="my-5"><a class="text-decoration-none d-inline-block w-100 p-3" href="{{route('categories')}}">
        Catégories & Sous-catégories
        </a> </li>
        <li class="my-5"><a class="text-decoration-none d-inline-block w-100 p-3" href="{{route('account_infos')}}">
        Paramètres du compte
        </a> </li>
    </ul>
    <button data-target="{{route('disconnect')}}" class="bg-transparent border-0 text-white p-3 fs-5 outline-none disconnect">Se déconnecter</button>
</nav>
</div>