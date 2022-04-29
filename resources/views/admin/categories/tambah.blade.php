@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        @include('admin.partials.flash')
        <div class="col-lg-6">
            <div class="card card-default mt-3">
                <div class="card-header card-border-bottom">
                    <h2>Tambah Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.store')}}" method="POST">
                        @csrf
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label for="parent">Parent</label>
                            <select name="parent_id" id="" class="form-control">
                                @foreach ($category as $item)
                                {{-- <option value="{{ $key->parent_id }}" @if ($key->parent_id==old('parent_id',
                                    $key->parent_id))
                                    selected="selected"
                                    @endif
                                    >{{ $value }}</option> --}}
                                <option value="{{$item->id}}">{{$item->name}}</option>
                                @endforeach
                                <option value="0">Choose this</option>
                            </select>
                        </div>
                        <a href="{{ route('categories.index')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Tambah</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection