@extends('layouts.admin.master')
@section('title', 'All Advertises - Urban Sole')

@section('content')
    @include('admin.includes.message')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Advertise ({{ $advertise->total() }})</h5>
            <small class="text-muted float-end">
                <a class="btn btn-primary" href="{{ route('advertise.create') }}"><i class="fa-solid fa-plus"></i>
                    Create</a>
            </small>
        </div>

        <div class="table-responsive text-nowrap">
            @if (!$advertise->isEmpty())
                <table class="table">
                    <thead>
                        <tr>
                            <th style="width: 3%">SN</th>
                            <th>Image</th>
                            <th>Title</th>
                            <th>Location</th>
                            <th>Order</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody class="table-border-bottom-0">
                        @foreach ($advertise as $key => $blog)
                            <tr>
                                <td><strong>{{ $key + $advertise->firstItem() }}</strong></td>
                                <td class="">
                                    <img src="{{ get_image_url($blog->image) }}" alt="{{ $blog->name }}" width="80px">
                                </td>
                                <td><strong>{{ $blog->name ?? '' }}</strong></td>
                                <td><strong>{{ $blog->location == 1 ? 'Top Colletion' : ($blog->location == 2 ? 'Single Full Content' : ($blog->location == 3 ? 'Top Colletion' : '')) }}</strong>
                                </td>
                                <td>{{ $blog->order }}</td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('advertise.edit', $blog->id) }}"
                                        style="float: left;margin-right: 5px;"><i class="fa-solid fa-pen-to-square"></i></a>

                                    <form class="delete-form" action="{{ route('advertise.destroy', $blog->id) }}"
                                        method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-danger delete_advertise mr-2" id=""
                                            data-type="confirm" type="submit" title="Delete"><i
                                                class="fa fa-trash"></i></button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $advertise->links() }}
            @else
                <div class="card-body">
                    <h6>No Data Found!</h6>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $('.delete_advertise').click(function(e) {
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
