@if ($errors->any())
<div class="alert alert-danger">
    <strong>Coba lagi</strong>
    Mungkin ada kesalahan dalam struktur data
    <br>
    <ul>
        @foreach ($errors->all() as $item)
        <li>{{ $item }}</li>
        @endforeach
    </ul>
</div>
@endif

@if(session('success'))
<div class="alert alert-success alert-dismissible fade show my-1" role="alert">
    {{session('success')}}
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif

@if(session('error'))
<div class="alert alert-danger alert-dismissible fade show my-1" role="alert"">
    {{session('error')}}
    <button type=" button" class="close" data-dismiss="alert" aria-label="Close">
    <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif