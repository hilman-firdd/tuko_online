@extends('admin.layout')

@section('content')

<div class="content">
    <div class="row">
        @include('admin.partials.flash')
        <div class="col-lg-6">
            <div class="card card-default mt-3">
                <div class="card-header card-border-bottom">
                    <h2>Edit Category</h2>
                </div>
                <div class="card-body">
                    <form action="{{ route('categories.update', $category->id)}}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id">
                        <div class="form-group">
                            <label for="name">Nama Kategori</label>
                            <input type="text" value="{{ old('name', $category->name)}}" name="name"
                                class="form-control">
                        </div>
                        <a href="{{ route('categories.index')}}" class="btn btn-primary">Back</a>
                        <button type="submit" class="btn btn-success">Edit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection