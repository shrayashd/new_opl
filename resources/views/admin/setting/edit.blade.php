@extends('layouts.admin.master')
@section('title', 'Website Settings - Ohm Pharmaceuticals')

@section('content')
    @include('admin.includes.message')
    <div class="content">
        <div class="container-fluid">
            <div class="">
                <div class="card-body p-0">
                    <form action="{{ route('admin.setting.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                        <div class="card card-primary shadow br-8">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-3 col-sm-2 nav flex-column gap-2 nav-pills" id="v-pills-tab"
                                        role="tablist" aria-orientation="vertical">
                                        <button class="nav-link text-start active" id="v-pills-global-tab"
                                            data-bs-toggle="pill" data-bs-target="#v-pills-global" type="button"
                                            role="tab" aria-controls="v-pills-global"
                                            aria-selected="true">Global</button>
                                        <button class="nav-link text-start" id="v-pills-home-tab" data-bs-toggle="pill"
                                            data-bs-target="#v-pills-home" type="button" role="tab"
                                            aria-controls="v-pills-home" aria-selected="false">Homepage</button>
                                    </div>
                                    <div class="col-9 col-sm-10 tab-content" id="v-pills-tabContent">
                                        <div class="tab-pane fade show active" id="v-pills-global" role="tabpanel"
                                            aria-labelledby="v-pills-global-tab">
                                            <div class="row">
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="image">Site Main Logo</label>
                                                        <div class="custom-file">
                                                            <a class="feature-modal" data-bs-toggle="modal"
                                                                data-bs-target="#featureModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_main_logo'])
                                                                            @php
                                                                                $feature = get_media($settings['site_main_logo'] ?? '');
                                                                            @endphp
                                                                            @if ($feature)
                                                                                <img id="feature_img"
                                                                                    src="{{ asset($feature->fullurl) }}"
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
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="feature_id" type="hidden"
                                                                name="site_main_logo"
                                                                value="{{ old('site_main_logo', $settings['site_main_logo']) }}">
                                                            @error('image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="banner">Site Fav Icon</label>
                                                        <div class="custom-file">
                                                            <a class="banner-modal" data-bs-toggle="modal"
                                                                data-bs-target="#bannerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_fav_icon'])
                                                                            @php
                                                                                $banner = get_media($settings['site_fav_icon'] ?? '');
                                                                            @endphp
                                                                            <img id="banner_img"
                                                                                src="{{ asset($banner->fullurl) }}"
                                                                                alt="{{ $banner->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="banner_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="banner_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="banner_id" type="hidden"
                                                                name="site_fav_icon"
                                                                value="{{ old('site_fav_icon', $settings['site_fav_icon']) }}">
                                                            @error('site_fav_icon')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="footer">Site Footer Logo</label>
                                                        <div class="custom-file">
                                                            <a class="footer-modal" data-bs-toggle="modal"
                                                                data-bs-target="#footerModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_footer_logo'])
                                                                            @php
                                                                                $footer = get_media($settings['site_footer_logo'] ?? '');
                                                                            @endphp
                                                                            <img id="footer_img"
                                                                                src="{{ asset($footer->fullurl) }}"
                                                                                alt="{{ $footer->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="footer_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="footer_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="footer_id" type="hidden"
                                                                name="site_footer_logo"
                                                                value="{{ old('site_footer_logo', $settings['site_footer_logo']) }}">
                                                            @error('site_footer_logo')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3 mt-2">
                                                        <label for="fimage">Site Contact Image</label>
                                                        <div class="custom-file">
                                                            <a class="fimage-modal" data-bs-toggle="modal"
                                                                data-bs-target="#fimageModel" href="javascript:void(0)">
                                                                <div
                                                                    class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                    <div
                                                                        class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                        @if ($settings['site_icon_image'])
                                                                            @php
                                                                                $fimage = get_media($settings['site_icon_image'] ?? '');
                                                                            @endphp
                                                                            <img id="fimage_img"
                                                                                src="{{ asset($fimage->fullurl) }}"
                                                                                alt="{{ $fimage->alt }}">
                                                                        @else
                                                                            <img class="custom-width" id="fimage_img"
                                                                                src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                alt="upload-image">
                                                                        @endif
                                                                    </div>
                                                                </div>
                                                            </a>
                                                            <a class="btn btn-sm btn-danger d-none" id="fimage_remove"
                                                                href="javascript:void(0)"><i class="fa fa-trash"></i>
                                                                Delete</a>

                                                            <input class="" id="fimage_id" type="hidden"
                                                                name="site_icon_image"
                                                                value="{{ old('site_icon_image', $settings['site_icon_image']) }}">
                                                            @error('site_icon_image')
                                                                <div class="invalid-feedback" style="display: block;">
                                                                    {{ $message }}
                                                                </div>
                                                            @enderror-
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-12">
                                                    <div class="form-group mb-3">
                                                        <label for="site_information">Site Information</label>
                                                        <textarea class="form-control br-8" name="site_information" rows="4" placeholder="Enter Site Information">{{ $settings['site_information'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone">Phone Number</label>
                                                        <input class="form-control br-8" type="tel" name="site_phone"
                                                            value="{{ $settings['site_phone'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email">Email</label>
                                                        <input class="form-control br-8" type="email" name="site_email"
                                                            value="{{ $settings['site_email'] }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_phone_two">Phone Number(2)</label>
                                                        <input class="form-control br-8" type="tel" two
                                                            name="site_phone_2" value="{{ $settings['site_phone_two'] }}"
                                                            placeholder="Enter Phone Number">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_email_two">Email(2)</label>
                                                        <input class="form-control br-8" type="email" two
                                                            name="site_email_2" value="{{ $settings['site_email_two'] }}"
                                                            placeholder="Enter Email">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location">Location</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location" value="{{ $settings['site_location'] }}"
                                                            placeholder="Enter Location">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_location_url">Location Url</label>
                                                        <input class="form-control br-8" type="text"
                                                            name="site_location_url"
                                                            value="{{ $settings['site_location_url'] }}"
                                                            placeholder="Enter Location Url">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_facebook">Facebook</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_facebook" value="{{ $settings['site_facebook'] }}"
                                                            placeholder="Enter Facebook">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_youtube">Youtube</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_youtube" value="{{ $settings['site_youtube'] }}"
                                                            placeholder="Enter Youtube">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_instagram">Instagram</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_instagram"
                                                            value="{{ $settings['site_instagram'] }}"
                                                            placeholder="Enter Instagram">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_linkedin">Instagram</label>
                                                        <input class="form-control br-8" type="url"
                                                            name="site_linkedin" value="{{ $settings['site_linkedin'] }}"
                                                            placeholder="Enter linkedin">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_topbar">Site Topbar</label>
                                                        <textarea class="form-control br-8" name="site_topbar" rows="4" placeholder="Enter Site experiance">{{ $settings['site_topbar'] }}</textarea>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="form-group mb-3">
                                                        <label for="site_copyright">Site Copyright</label>
                                                        <textarea class="form-control br-8" name="site_copyright" rows="4" placeholder="Enter Site Copyright">{{ $settings['site_copyright'] }}</textarea>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="tab-pane fade" id="v-pills-home" role="tabpanel"
                                            aria-labelledby="v-pills-home-tab">
                                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link active" id="pills-home-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-home" type="button"
                                                        role="tab" aria-controls="pills-home"
                                                        aria-selected="true">Home</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-profile-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-profile" type="button" role="tab"
                                                        aria-controls="pills-profile"
                                                        aria-selected="false">Categories</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-activity-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-activity"
                                                        type="button" role="tab" aria-controls="pills-activity"
                                                        aria-selected="false">Brands</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-products-tab"
                                                        data-bs-toggle="pill" data-bs-target="#pills-products"
                                                        type="button" role="tab" aria-controls="pills-products"
                                                        aria-selected="false">Products</button>
                                                </li>
                                                <li class="nav-item" role="presentation">
                                                    <button class="nav-link" id="pills-review-tab" data-bs-toggle="pill"
                                                        data-bs-target="#pills-review" type="button" role="tab"
                                                        aria-controls="pills-review"
                                                        aria-selected="false">Reviews</button>
                                                </li>
                                            </ul>
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-home" role="tabpanel"
                                                    aria-labelledby="pills-home-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="homepage_title">Enter Homepage Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="homepage_title"
                                                                    value="{{ $settings['homepage_title'] }}"
                                                                    placeholder="Enter Homepage Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3 mt-2">
                                                                <label for="home">Select Homepage Image</label>
                                                                <div class="custom-file">
                                                                    <a class="home-modal" data-bs-toggle="modal"
                                                                        data-bs-target="#homeModel"
                                                                        href="javascript:void(0)">
                                                                        <div
                                                                            class="upload-media border border-2 d-flex justify-content-center align-items-center mb-3">
                                                                            <div
                                                                                class="thumbnails media-wrapper d-flex justify-content-center align-items-center">
                                                                                @if ($settings['homepage_image'])
                                                                                    @php
                                                                                        $home = get_media($settings['homepage_image'] ?? '');
                                                                                    @endphp
                                                                                    <img id="home_img"
                                                                                        src="{{ asset($home->fullurl) }}"
                                                                                        alt="{{ $home->alt }}">
                                                                                @else
                                                                                    <img class="custom-width"
                                                                                        id="home_img"
                                                                                        src="{{ asset('admin/assets/images/upload.png') }}"
                                                                                        alt="upload-image">
                                                                                @endif
                                                                            </div>
                                                                        </div>
                                                                    </a>
                                                                    <a class="btn btn-sm btn-danger d-none"
                                                                        id="home_remove" href="javascript:void(0)"><i
                                                                            class="fa fa-trash"></i>
                                                                        Delete</a>

                                                                    <input class="" id="home_id" type="hidden"
                                                                        name="homepage_image"
                                                                        value="{{ old('homepage_image', $settings['homepage_image']) }}">
                                                                    @error('homepage_image')
                                                                        <div class="invalid-feedback" style="display: block;">
                                                                            {{ $message }}
                                                                        </div>
                                                                    @enderror
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <div class="form-group mb-3">
                                                                <label for="homepage_description">Enter Homepage
                                                                    Description</label>
                                                                <textarea class="form-control ckeditor br-8" name="homepage_description" rows="4">{{ $settings['homepage_description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="team_title">Enter Team Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="team_title"
                                                                    value="{{ $settings['team_title'] }}"
                                                                    placeholder="Enter Team Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="blog_title">Enter Blog Title</label>
                                                                <input class="form-control br-8" type="text"
                                                                    name="blog_title"
                                                                    value="{{ $settings['blog_title'] }}"
                                                                    placeholder="Enter Blog Title">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="team_description">Enter Team
                                                                    Description</label>
                                                                <textarea class="form-control br-8" name="team_description" rows="4">{{ $settings['team_description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group mb-3">
                                                                <label for="blog_description">Enter Blog
                                                                    Description</label>
                                                                <textarea class="form-control br-8" name="blog_description" rows="4">{{ $settings['blog_description'] }}</textarea>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3">
                                                                <legend class="float-none w-auto legend-title">SEO</legend>
                                                                <div class="row">

                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_title">Enter Homepage
                                                                                Seo
                                                                                Title</label>
                                                                            <input class="form-control br-8"
                                                                                type="text" name="homepage_seo_title"
                                                                                value="{{ $settings['homepage_seo_title'] }}"
                                                                                placeholder="Enter Homepage Seo Title">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_keywords">Enter
                                                                                Homepage
                                                                                Seo Keywords</label>
                                                                            <input class="form-control br-8"
                                                                                type="text"
                                                                                name="homepage_seo_keywords"
                                                                                value="{{ $settings['homepage_seo_keywords'] }}"
                                                                                placeholder="Enter Homepage Seo Keywords">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_description">Enter
                                                                                Homepage
                                                                                Seo
                                                                                Description</label>
                                                                            <textarea class="form-control br-8" name="homepage_seo_description" rows="4">{{ $settings['homepage_seo_description'] }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="homepage_seo_schema">Enter Homepage
                                                                                Seo
                                                                                Schema</label>
                                                                            <textarea class="form-control br-8" name="homepage_seo_schema" rows="10">{{ $settings['homepage_seo_schema'] }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-profile" role="tabpanel"
                                                    aria-labelledby="pills-profile-tab" tabindex="0">

                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Product
                                                                    Category
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="categorysmalltitle">Small
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="categorysmalltitle"
                                                                                value="{{ $settings['categorysmalltitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="categorybigtitle">Big
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="categorybigtitle"
                                                                                value="{{ $settings['categorybigtitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="category">Select Categories</label>
                                                                        @if ($settings['categorys'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['categorys'] as $id)
                                                                                    @php
                                                                                        $footcat = getCategoryByID($id);
                                                                                    @endphp
                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->name }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="categorys"
                                                                            name="categorys[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($categorys->isNotEmpty())
                                                                                @foreach ($categorys as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>

                                                                    <div class="col-md-12">
                                                                        <label for="categoryproduct">Select
                                                                            Products</label>
                                                                        @if ($settings['categoryproduct'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['categoryproduct'] as $id)
                                                                                    @php
                                                                                        $footcat = getProductByID($id);
                                                                                    @endphp
                                                                                    <span
                                                                                        class="badge bg-success">{{ $footcat->name }}</span>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="categoryproduct"
                                                                            name="categoryproduct[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($products->isNotEmpty())
                                                                                @foreach ($products as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="tab-pane fade" id="pills-activity" role="tabpanel"
                                                    aria-labelledby="pills-activity-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Product
                                                                    Brands
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="brandsmalltitle">Small
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="brandsmalltitle"
                                                                                value="{{ $settings['brandsmalltitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="brandbigtitle">Big
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="brandbigtitle"
                                                                                value="{{ $settings['brandbigtitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="brand">Select Brands</label>
                                                                        @if ($settings['brands'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['brands'] as $id)
                                                                                    @php
                                                                                        $footcat = getBrandByID($id);
                                                                                    @endphp
                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->name }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="brands"
                                                                            name="brands[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($brands->isNotEmpty())
                                                                                @foreach ($brands as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="brandproduct">Select Products</label>
                                                                        @if ($settings['brandproduct'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['brandproduct'] as $id)
                                                                                    @php
                                                                                        $footcat = getProductByID($id);
                                                                                    @endphp
                                                                                    <span
                                                                                        class="badge bg-success">{{ $footcat->name }}</span>
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="brandproduct"
                                                                            name="brandproduct[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($products->isNotEmpty())
                                                                                @foreach ($products as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-products" role="tabpanel"
                                                    aria-labelledby="pills-products-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Featured
                                                                    Products</legend>
                                                                <div class="row">
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="productsmalltitle">Small
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="productsmalltitle"
                                                                                value="{{ $settings['productsmalltitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-6">
                                                                        <div class="form-group mb-3">
                                                                            <label for="productbigtitle">Big
                                                                                Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="productbigtitle"
                                                                                value="{{ $settings['productbigtitle'] ?? '' }}">
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="product">Select Products</label>
                                                                        @if ($settings['product'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['product'] as $id)
                                                                                    @php
                                                                                        $footcat = getProductByID($id);
                                                                                    @endphp
                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->name }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="product"
                                                                            name="product[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($products->isNotEmpty())
                                                                                @foreach ($products as $pck)
                                                                                    <option value="{{ $pck->id }}">
                                                                                        {{ $pck->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="tab-pane fade" id="pills-review" role="tabpanel"
                                                    aria-labelledby="pills-review-tab" tabindex="0">
                                                    <div class="row">
                                                        <div class="col-md-12">
                                                            <fieldset class="border p-3 mb-3">
                                                                <legend class="float-none w-auto legend-title">Reviews
                                                                </legend>
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <div class="form-group mb-3">
                                                                            <label for="reviewtitle">Review Title</label>
                                                                            <input class="form-control" type="text"
                                                                                name="reviewtitle"
                                                                                value="{{ $settings['reviewtitle'] ?? '' }}">
                                                                        </div>
                                                                        <div class="form-group mb-3">
                                                                            <label for="reviewinfo">Review Info</label>
                                                                            <textarea class="form-control br-8" name="reviewinfo" rows="4" placeholder="Enter Something ...">{{ $settings['reviewinfo'] ?? '' }}</textarea>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-12">
                                                                        <label for="reviews">Select Reviews</label>
                                                                        @if ($settings['reviews'])
                                                                            <div class="d-flex gap-2 my-3 flex-wrap">
                                                                                @foreach ($settings['reviews'] as $id)
                                                                                    @php
                                                                                        $footcat = getReviewByID($id);
                                                                                    @endphp
                                                                                    @if ($footcat)
                                                                                        <span
                                                                                            class="badge bg-success">{{ $footcat->name }}</span>
                                                                                    @endif
                                                                                @endforeach
                                                                            </div>
                                                                        @endif
                                                                        <select class="form-control" id="reviews"
                                                                            name="reviews[]"
                                                                            placeholder="This is a placeholder" multiple>
                                                                            @if ($reviews->isNotEmpty())
                                                                                @foreach ($reviews as $rev)
                                                                                    <option value="{{ $rev->id }}">
                                                                                        {{ $rev->name }}</option>
                                                                                @endforeach
                                                                            @endif
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </fieldset>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footers">
                                    <button class="btn btn-sm btn-primary" type="submit"><i
                                            class="fa-solid fa-rotate"></i> Update Setting</button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')

    <script type="text/javascript" src="{{ asset('admin/assets/vendor/libs/choices/scripts/choices.min.js') }}"></script>

    <script>
        function selfChoice(value) {
            var option = new Choices(
                value, {
                    allowHTML: true,
                    removeItemButton: true,
                    fuseOptions: {
                        includeScore: true
                    },
                }
            );

        }
        selfChoice('#categorys');
        selfChoice('#categoryproduct');
        selfChoice('#brands');
        selfChoice('#brandproduct');
        selfChoice('#product');
        selfChoice('#reviews');
        selfChoice('#services');

        selfChoice('#faqs');
    </script>
@endsection
