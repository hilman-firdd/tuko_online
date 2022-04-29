@extends('admin.layout')

@section('content')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Products</h2>
                </div>
                <div class="card-body">
                    @include('admin.partials.flash')
                    <table class="table table-bordered table-striped">
                        <thead>
                            <th>#</th>
                            <th>SKU</th>
                            <th>Type</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Status</th>
                            <th style="width:15%">Action</th>
                        </thead>
                        <tbody>
                            @forelse ($products as $product)
                            <tr>
                                <td>{{ $product->id }}</td>
                                <td>{{ $product->sku }}</td>
                                <td>{{ $product->type }}</td>
                                <td>{{ $product->name }}</td>
                                <td>{{ number_format($product->price) }}</td>
                                <td>{{ $product->statusLabel() }}</td>
                                <td>
                                    <a href="{{ route('products.edit', $product->id) }}"
                                        class="btn btn-warning btn-sm">edit</a>

                                    {{-- @can('delete_products') --}}
                                    <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                        action="{{ route('products.delete', $product->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger shadow">Delete</button>
                                    </form>
                                    {{-- @endcan --}}
                                </td>
                            </tr>
                            @empty
                            <tr>
                                <td colspan="7">No records found</td>
                            </tr>
                            @endforelse
                        </tbody>
                    </table>
                    {{ $products->links() }}
                </div>
                {{-- @can('add_products') --}}
                <div class="card-footer text-right">
                    <a href="{{ route('products.create') }}" class="btn btn-primary">Add New</a>
                </div>
                {{-- @endcan --}}
            </div>
        </div>
    </div>
</div>
@endsection