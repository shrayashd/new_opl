@extends('layouts.admin.master')
@section('title', 'Edit ' . $department->name . ' - Ohm Pharmaceuticals')

@section('content')
    @include('admin.includes.message')

    <div class="content">
        <div class="card container-fluid mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit Department - {{ $department->name }}</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('department.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body p-0">
                <form class="row" method="POST" action="{{ route('department.update', $department->id) }}"
                    enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="col-md-9">
                        <div class="card card-body main-description shadow br-8 p-4">
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Name</label>
                                        <input class="form-control @error('name') is-invalid @enderror" id=""
                                            type="text" name="name" value="{{ old('name', $department->name) }}"
                                            placeholder="">
                                        @error('name')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-slug">slug</label>
                                        <input class="form-control @error('slug') is-invalid @enderror" id=""
                                            type="text" name="slug" value="{{ old('slug', $department->slug) }}"
                                            placeholder="">
                                        @error('slug')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-group mb-3">
                                <label for="description">Description</label>
                                <textarea class="form-control ckeditor br-8 @error('description') is-invalid @enderror" id="description"
                                    name="description" rows="10" placeholder="Enter Description">{{ old('description', $department->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label for="gallery">Gallery</label>
                                <div class="custom-file">
                                    <a class="gallery-modal" data-bs-toggle="modal" data-bs-target="#galleryModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3 p-3">
                                            <div class="row row-cols-auto gap-2 thumb-image " id="gallerysimg">
                                                @if ($department->gallery)
                                                    @php
                                                        $gallery = get_gallery($department->gallery);
                                                    @endphp
                                                    @foreach ($gallery as $galls)
                                                        <div
                                                            class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                            <img id="gallery_img" src="{{ asset($galls->fullurl) }}"
                                                                alt="{{ $galls->alt }}">
                                                        </div>
                                                    @endforeach
                                                @else
                                                    <div
                                                        class="col thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                        <img class="custom-width" id="gallery_img"
                                                            src="{{ asset('admin/assets/images/upload.png') }}"
                                                            alt="upload-image">
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="gallery_remove" href="javascript:void(0)"><i
                                            class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="gallery_id" type="hidden" name="gallery"
                                        value="{{ old('gallery', $department->gallery) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card card-body seo my-5 shadow br-8 p-4">
                            <fieldset class="border p-3">
                                <legend class="float-none w-auto legend-title">SEO</legend>
                                <div class="form-group mb-3">
                                    <label for="seo_title">Seo Title</label>
                                    <input class="form-control br-8" type="text" name="seo_title"
                                        value="{{ old('seo_title', $department->seo_title) }}"
                                        placeholder="Enter Seo Title">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_description">Seo Description</label>
                                    <textarea class="form-control br-8" name="seo_description" rows="4" placeholder="Enter Seo Description">{{ old('seo_description', $department->seo_description) }}</textarea>
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_keywords">Seo Keywords</label>
                                    <input class="form-control br-8" type="text" name="seo_keywords"
                                        value="{{ old('seo_keywords', $department->seo_keywords) }}"
                                        placeholder="Enter Seo Keywords">
                                </div>
                                <div class="form-group mb-3">
                                    <label for="seo_schema">Seo Schema</label>
                                    <textarea class="form-control br-8" name="seo_schema" rows="10" placeholder="Enter Seo Schema">{{ old('seo_schema', $department->seo_schema) }}</textarea>
                                </div>
                            </fieldset>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card shadow br-8">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($department->status == 0) selected @endif>
                                        Draft</option>
                                    <option class="p-3"@if ($department->status == 1) selected @endif
                                        value="1">
                                        Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 mt-2">
                                <label for="image">Featured Image</label>
                                <div class="custom-file">
                                    <a class="feature-modal" data-bs-toggle="modal" data-bs-target="#featureModel"
                                        href="javascript:void(0)">
                                        <div
                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                            <div
                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                @if ($department->image)
                                                    @php
                                                        $feature = get_media($department->image ?? '');
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
                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                        alt="upload-image">
                                                @endif
                                            </div>
                                        </div>
                                    </a>
                                    <a class="btn btn-sm btn-danger d-none" id="feature_remove"
                                        href="javascript:void(0)"><i class="fa fa-trash"></i> Delete</a>

                                    <input class="" id="feature_id" type="hidden" name="image"
                                        value="{{ old('image', $department->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success"
                                    href="{{ route('departmentsingle', $department->slug) }}" target="_blank"><i
                                        class="fa-solid fa-eye"></i> View</a>
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
