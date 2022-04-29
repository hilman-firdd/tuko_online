@extends('admin.layout')

@section('content')
<div class="content mt-5">
    <div class="row">
        <div class="col-lg-12">
            @include('admin.partials.flash')
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Categories</h2>
                </div>
                <div class="card-body">
                    <table class="table table-bordered table-stripped mb-4">
                        <thead>
                            <th>no</th>
                            <th>Name</th>
                            <th>Slug</th>
                            <th>Parent</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @php $no = 1; @endphp
                            @forelse ($data as $item)
                            <tr>
                                <td>{{ $no++ }}</td>
                                <td>{{ $item->name}}</td>
                                <td>{{ $item->slug}}</td>
                                <td>{{ $item->parent ? $item->parent->name : '' }}</td>
                                <td>
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('categories.destroy', $item->id) }}" method="POST">
                                        <a href="{{ route('categories.edit', $item->id)}}"
                                            class="btn btn-info btn-sm">Edit</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                    </form>
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="5">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>

                    {{ $data->links('pagination::bootstrap-4') }}
                </div>
                <div class="card-footer text-right">
                    <a href="{{ route('categories.create')}}" class="btn btn-primary">Tambah Baru</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection