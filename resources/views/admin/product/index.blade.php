@extends('layouts.admin.master')
@section('title', 'All Products')

@section('content')
    @include('admin.includes.message')
    <div class="card">

        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Products ({{ $products->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('products.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$products->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Name</th>
                            <th style="text-align: center">Status</th>
                            <th style="text-align: end">Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($products as $key => $product)
                            <tr>
                                <td><strong>{{ $key + $products->firstItem() }}</strong></td>
                                <td><strong>{{ $product->name ?? '' }}</strong></td>
                                <td style="text-align: center"><span
                                        class="badge {{ $product->status == 0 ? 'bg-label-danger' : 'bg-label-success' }}">{{ $product->status == 0 ? 'Draft' : 'Published' }}</span>
                                </td>

                                <td>
                                    <div class="d-flex justify-content-end">
                                        <a class="btn btn-sm btn-success"
                                            href="{{ route('productssingle', $product->slug) }}" target="_blank"
                                            style="float: left;margin-right: 5px;"><i class="fa-solid fa-eye"></i></a>
                                        <a class="btn btn-sm btn-primary" href="{{ route('products.edit', $product->id) }}"
                                            style="float: left;margin-right: 5px;"><i
                                                class="fa-solid fa-pen-to-square"></i></a>
                                        <a class="btn btn-sm btn-warning" href="{{ route('products.repli', $product->id) }}"
                                            style="float: left;margin-right: 5px;"><i class="fa-solid fa-copy"></i></a>
                                        <form class="delete-form" action="{{ route('products.destroy', $product->id) }}"
                                            method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger delete_product mr-2" id=""
                                                data-type="confirm" type="submit" title="Delete"><i
                                                    class="fa fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $products->links() }}
            @else
                <div class="card-body">
                    <h6>No Product Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_product').click(function(e) {
            e.preventDefault();
            swal({
                    title: `Are you sure?`,
                    text: "If you delete this, it will be gone forever.",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willDelete) => {
                    if (willDelete) {
                        $(this).closest("form").submit();
                    }
                });
        });
    </script>
@endsection
