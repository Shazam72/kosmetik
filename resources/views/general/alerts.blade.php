@if($errors->any())
<div class="alert alert-danger alert-dismissible fade show py-5" role="alert">
    <ul>
        @foreach($errors->all() as $error)
        <li>{{$error}}</li>
        @endforeach
    </ul>

    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif


@if(Session::has('success'))
<div class="alert alert-success alert-dismissible fade show py-5" role="alert">
    {{Session::get('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
@endif