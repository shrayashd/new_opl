@extends('layouts.admin.master')
@section('title', 'Edit ' . $product->name . ' - Ohm Pharmaceuticals')
@section('content')
    @include('admin.includes.message')
    <div class="col-xl">
        <div class="card mb-4">
            <div class="card-header d-flex justify-content-between align-items-center">
                <h5 class="mb-0">Edit product "{{ $product->name }}"</h5>
                <small class="text-muted float-end">
                    <a class="btn btn-primary" href="{{ route('products.index') }}"><i class="fa-solid fa-arrow-left"></i>
                        Back</a>
                </small>
            </div>
            <div class="card-body">
                <form class="row" method="POST" action="{{ route('products.update', $product->id) }}"
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
                                            type="text" name="name" value="{{ old('name', $product->name) }}"
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
                                            type="text" name="slug" value="{{ old('slug', $product->slug) }}"
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
                                <label class="form-label" for="basic-default-formula">Formula</label>
                                <input class="form-control @error('formula') is-invalid @enderror" id=""
                                    type="text" name="formula" value="{{ old('formula', $product->formula) }}"
                                    placeholder="">
                                @error('formula')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Description</label>
                                <textarea class="form-control @error('description') is-invalid @enderror ckeditor" id="" name="description"
                                    rows="8" placeholder="">{{ old('description', $product->description) }}</textarea>
                                @error('description')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="form-group mb-3">
                                <label class="form-label" for="basic-default-message">Short Description</label>
                                <textarea class="form-control @error('short_description') is-invalid @enderror" id="" name="short_description"
                                    rows="4" placeholder="">{{ old('short_description', $product->short_description) }}</textarea>
                                @error('short_description')
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
                                                @if ($product->gallery)
                                                    @php
                                                        $gallery = get_gallery($product->gallery);
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
                                        value="{{ old('gallery', $product->gallery) }}">
                                </div>
                            </div>
                        </div>
                        <div class="card card-body my-5 shadow br-8 p-4">
                            <ul class="nav nav-tabs px-4" id="myTab" role="tablist">
                                <li class="nav-item" role="overview">
                                    <button class="nav-link active" id="overview-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-overview" type="button" role="tab"
                                        aria-controls="overview" aria-selected="true">General Info</button>
                                </li>
                                <li class="nav-item" role="education">
                                    <button class="nav-link" id="education-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-education" type="button" role="tab"
                                        aria-controls="education" aria-selected="true">Indication</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="contraindication-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-contraindication" type="button" role="tab"
                                        aria-controls="contraindication" aria-selected="false">Contraindication</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="dosage-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-dosage" type="button" role="tab"
                                        aria-controls="dosage" aria-selected="false">Dosage</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link" id="effects-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-effects" type="button" role="tab"
                                        aria-controls="effects" aria-selected="false">Side Effects</button>
                                </li>

                                <li class="nav-item" role="seo">
                                    <button class="nav-link" id="seo-tab" data-bs-toggle="tab"
                                        data-bs-target="#nav-seo" type="button" role="tab" aria-controls="seo"
                                        aria-selected="true">SEO</button>
                                </li>
                            </ul>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-overview" role="tabpanel"
                                    aria-labelledby="nav-overview-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">General Info</label>
                                        <textarea class="form-control ckeditor1" id="" name="specification" cols="30" rows="10"> {{ old('specification', $product->specification) }}</textarea>
                                        @error('specification')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-education" role="tabpanel"
                                    aria-labelledby="nav-education-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Indication</label>
                                        <textarea class="form-control ckeditor2" id="" name="education" cols="30" rows="10"> {{ old('education', $product->education) }}</textarea>
                                        @error('education')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="tab-pane fade" id="nav-contraindication" role="tabpanel"
                                    aria-labelledby="nav-contraindication-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Contraindication</label>
                                        <textarea class="form-control ckeditor3" id="" name="contraindication" cols="30" rows="10">{{ old('contraindication', $product->contraindication) }}
                                    </textarea>
                                        @error('contraindication')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-dosage" role="tabpanel"
                                    aria-labelledby="nav-dosage-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Dosage</label>
                                        <textarea class="form-control ckeditor4" id="" name="dosage" cols="30" rows="10">{{ old('dosage', $product->dosage) }}
                                    </textarea>
                                        @error('dosage')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-effects" role="tabpanel"
                                    aria-labelledby="nav-effects-tab">
                                    <div class="form-group mb-3">
                                        <label class="form-label" for="basic-default-fullname">Side Effects</label>
                                        <textarea class="form-control ckeditor5" id="" name="effects" cols="30" rows="10">{{ old('effects', $product->effects) }}
                                    </textarea>
                                        @error('effects')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-seo" role="tabpanel" aria-labelledby="nav-seo-tab">
                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Title</label>
                                        <input class="form-control @error('seo_title') is-invalid @enderror"
                                            id="" type="text" name="seo_title"
                                            value="{{ old('seo_title', $product->seo_title) }}" placeholder="">
                                        @error('seo_title')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Description</label>
                                        <textarea class="form-control @error('seo_description') is-invalid @enderror" id="" name="seo_description"
                                            cols="30" rows="10">{{ old('seo_description', $product->seo_description) }}</textarea>
                                        @error('seo_description')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Keywords</label>
                                        <input class="form-control @error('seo_keywords') is-invalid @enderror"
                                            id="" type="text" name="seo_keywords"
                                            value="{{ old('seo_keywords', $product->seo_keywords) }}" placeholder="">
                                        @error('seo_keywords')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label" for="basic-default-fullname">Seo Schema</label>
                                        <textarea class="form-control @error('seo_schema') is-invalid @enderror" id="" name="seo_schema"
                                            rows="8">{{ old('seo_schema', $product->seo_schema) }}</textarea>
                                        @error('seo_schema')
                                            <div class="invalid-feedback" style="display: block;">
                                                {{ $message }}
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card-body card my-3 shadow br-8 p-4">
                            <div class="form-group mb-3 d-flex align-items-center">
                                <label class="m-0 p-0">Status</label>
                                <select class="form-select ms-5" id="status" name="status">
                                    <option class="p-3" value="0"
                                        @if ($product->status == 0) selected @endif>Draft</option>
                                    <option class="p-3"@if ($product->status == 1) selected @endif
                                        value="1">Publish</option>
                                </select>
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="price">Price</label>
                                <input class="form-control ms-5 @error('price') is-invalid @enderror" type="text"
                                    name="price" value="{{ old('price', $product->price) }}"
                                    placeholder="Enter Price">
                                @error('price')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <hr class="shadow-sm">

                            <div class="form-group mb-3 d-flex align-items-center">
                                <label for="mrp">MRP</label>
                                <input class="form-control ms-5 @error('mrp') is-invalid @enderror" type="text"
                                    name="mrp" value="{{ old('mrp', $product->mrp) }}" placeholder="Enter MRP">
                                @error('price')
                                    <div class="invalid-feedback" style="display: block;">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

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
                                                @if ($product->image)
                                                    @php
                                                        $feature = get_media($product->image ?? '');
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
                                        value="{{ old('image', $product->image) }}">
                                    @error('image')
                                        <div class="invalid-feedback" style="display: block;">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>

                            <hr class="shadow-sm">
                            <div class="form-group mb-3 mt-2">
                                <label for="qr">Product QR</label>
                                <br>
                                <a href="{{ 'data:image/png;base64,' .
                                    DNS2D::getBarcodePNG(route('productssingle', $product->slug), 'QRCODE', 15, 15, [1, 1, 1]) .
                                    '' }}"
                                    download="qr-{{ $product->slug }}">
                                    {!! '<img class="w-100" src="data:image/png;base64,' .
                                        DNS2D::getBarcodePNG(route('productssingle', $product->slug), 'QRCODE', 10, 10, [1, 1, 1]) .
                                        '" alt="barcode" title="' .
                                        $product->name .
                                        '" />' !!}
                                </a>
                            </div>
                            <hr class="shadow-sm">

                            <div class="card-footers d-flex justify-content-between">
                                <a class="btn btn-sm btn-success" href="{{ route('productssingle', $product->slug) }}"
                                    target="_blank"><i class="fa-solid fa-eye"></i> View</a>
                                <button class="btn btn-sm btn-primary" type="submit"><i class="fa-solid fa-rotate"></i>
                                    Update</button>
                            </div>
                        </div>
                        @include('admin.product.includes.category')
                        <br>
                        @include('admin.product.includes.brands')
                        <br>
                        @include('admin.product.includes.divisions')
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
