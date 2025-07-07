@extends('layouts.admin.master')
@section('title', 'Edit ' . $advertise->name . ' - Urban Sole')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit advertise - {{ $advertise->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('advertise.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0 mb-5">
                <form class="row" method="POST" action="{{ route('advertise.update', $advertise->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="form-group mb-3">
                                <label for="name">Name</label>
                                <input class="form-control br-8 @error('name') is-invalid @enderror" type="text"
                                    name="name" value="{{ old('name', $advertise->name) }}" placeholder="Enter Name">
                                @error('name')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="form-group mb-3 mt-2">
                            <label for="image">Advertise Image</label>
                            <div class="custom-file">
                                <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                    href="javascript:void(0)">
                                    <div
                                        class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                        <div
                                            class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                            @if ($advertise->image)
                                                @php
                                                    $feature = get_media($advertise->image ?? '');
                                                @endphp
                                                @if ($feature)
                                                    <img id="feature_img" src="{{ asset($feature->fullurl) }}"
                                                        alt="{{ $feature->alt }}">
                                                @else
                                                    <img id="feature_img"
                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                        alt="upload-image">
                                                @endif
                                            @else
                                                <img class="custom-width" id="feature_img"
                                                    src="{{ asset('admin/assets/images/upload.png') }}" alt="upload-image">
                                            @endif
                                        </div>
                                    </div>
                                </a>
                                <a class="btn btn-sm btn-danger d-none" id="feature_remove" href="javascript:void(0)"><i
                                        class="fa fa-trash"></i> Delete</a>

                                <input class="" id="feature_id" type="hidden" name="image"
                                    value="{{ old('image', $advertise->image) }}">
                                @error('image')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0" @if ($advertise->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($advertise->status == 1) selected @endif value="1">
                                        Publish</option>
                                </select>
                            </div>
                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="order">Order</label>
                                <input class="form-control ms-5 @error('order') is-invalid @enderror" type="number"
                                    name="order" value="{{ old('order', $advertise->order) }}" placeholder="Enter Order">
                                @error('order')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Location</label>
                                <select class="form-select ms-5" id="location" name="location">
                                    <option class="p-3">Select Ads Location</option>
                                    <option class="p-3" value="1" @if ($advertise->location == 1) selected @endif>
                                        Top 3-Row</option>
                                    <option class="p-3" value="2" @if ($advertise->location == 2) selected @endif>
                                        Single Full Content</option>
                                    <option class="p-3" value="3" @if ($advertise->location == 3) selected @endif>
                                        Bottom left</option>
                                    <option class="p-3" value="4" @if ($advertise->location == 4) selected @endif>
                                        Bottom Center Full</option>
                                    <option class="p-3" value="5" @if ($advertise->location == 5) selected @endif>
                                        Bottom Right</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers">
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
