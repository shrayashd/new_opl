<?php

use App\Models\Brand;
use App\Models\Category;
use App\Models\Faq;
use App\Models\Media;
use App\Models\Member;
use App\Models\Menu;
use App\Models\MenuLocation;
use App\Models\News;
use App\Models\Page;
use App\Models\Product;
use App\Models\Review;
use App\Models\Services;
use App\Models\Setting;

function getMenus($id)
{
    $nav = MenuLocation::where('location', $id)->first();
    if ($nav) {
        $sitemenu = json_decode($nav->content);
        $sitemenu = $sitemenu[0];
        foreach ($sitemenu as $menu) {
            $menu->title = Menu::where('id', $menu->id)->value('title');
            $menu->name = Menu::where('id', $menu->id)->value('name');
            $menu->slug = Menu::where('id', $menu->id)->value('slug');
            $menu->target = Menu::where('id', $menu->id)->value('target');
            $menu->type = Menu::where('id', $menu->id)->value('type');
            if (!empty($menu->children[0])) {
                foreach ($menu->children[0] as $child) {
                    $child->title = Menu::where('id', $child->id)->value('title');
                    $child->name = Menu::where('id', $child->id)->value('name');
                    $child->slug = Menu::where('id', $child->id)->value('slug');
                    $child->target = Menu::where('id', $child->id)->value('target');
                    $child->type = Menu::where('id', $child->id)->value('type');

                    if (!empty($child->children[0])) {
                        foreach ($child->children[0] as $subchild) {
                            $subchild->title = Menu::where('id', $subchild->id)->value('title');
                            $subchild->name = Menu::where('id', $subchild->id)->value('name');
                            $subchild->slug = Menu::where('id', $subchild->id)->value('slug');
                            $subchild->target = Menu::where('id', $subchild->id)->value('target');
                            $subchild->type = Menu::where('id', $subchild->id)->value('type');

                            if (!empty($subchild->children[0])) {
                                foreach ($subchild->children[0] as $newchild) {
                                    $newchild->title = Menu::where('id', $newchild->id)->value('title');
                                    $newchild->name = Menu::where('id', $newchild->id)->value('name');
                                    $newchild->slug = Menu::where('id', $newchild->id)->value('slug');
                                    $newchild->target = Menu::where('id', $newchild->id)->value('target');
                                    $newchild->type = Menu::where('id', $newchild->id)->value('type');
                                }
                            }
                        }
                    }
                }
            }
        }

        return $sitemenu;
    }
}

function getPages()
{
    return Page::where('status', 1)->orderBy('created_at', 'DESC')->get();
}

function getBlog($limit, $id = '')
{
    return News::where('status', 1)->where('id', '!=', $id)->oldest('created_at')->limit($limit)->get();
}

function getService($limit, $id = '')
{
    return Services::where('status', 1)->where('id', '!=', $id)->oldest('created_at')->limit($limit)->get();
}


function getSettings()
{
    return Setting::pluck('value', 'key')->toArray();
}


function getPagesById($id)
{
    return Page::where('status', 1)->where('id', $id)->first();
}

function getReviewByID($Id)
{
    return Review::where('id', $Id)->first();
}

function getServiceByID($Id)
{
    return Services::where('id', $Id)->first();
}

function getFaqByID($Id)
{
    return Faq::where('id', $Id)->first();
}


function getProductByID($Id)
{
    return Product::where('id', $Id)->first();
}


function getBrandByID($Id)
{
    return Brand::where('id', $Id)->first();
}
function getCategoryByID($Id)
{
    return Category::where('id', $Id)->first();
}


if (!function_exists('make_slug')) {
    function make_slug($string)
    {
        return Str::slug($string);
    }
}

if (!function_exists('galleryfileUpload')) {
    function galleryfileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalName();
            $image->move(public_path('storage/' . $foldername . '/'), $image_new_name);

            $image = '/storage/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}

if (!function_exists('removeFile')) {
    function removeFile($file)
    {
        if (File::exists(public_path($file))) {
            File::delete(public_path($file));
        }
    }
}

if (!function_exists('stripLetters')) {
    function stripLetters($text, $number, $last = "")
    {
        if (!empty($text)) {
            return substr(strip_tags(html_entity_decode($text)), 0, $number) . $last;
        }
    }
}
if (!function_exists('image_sizes')) {
    function image_sizes()
    {
        $size = [
            'home-banner-slider' => ['width' => 1903, 'height' => 584],
            'home-blog' => ['width' => 447, 'height' => 276],
            'blog-single' => ['width' => 803, 'height' => 491],
            'gallery-big' => ['width' => 595, 'height' => 563],
            'home-team' => ['width' => 283, 'height' => 322],
            'home-product' => ['width' => 264, 'height' => 285],
            'gallery-small' => ['width' => 121, 'height' => 123],
            'home-category' => ['width' => 105, 'height' => 100],
            'home-review' => ['width' => 93, 'height' => 93],
            'blog-sidebar' => ['width' => 85, 'height' => 74],
        ];
        return  $size;
    }
}

if (!function_exists('get_image_size')) {
    function get_image_size($size = '')
    {
        if ($size) {
            $sizes  = image_sizes();
            return '-' . $sizes[$size]['width'] . 'x' . $sizes[$size]['height'];
        }
    }
}
if (!function_exists('get_image')) {
    function get_image($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        }
    }
}



if (!function_exists('get_banner')) {
    function get_banner($id, $class = "", $size = "")
    {
        $image = Media::where('id', $id)->first();
        $dimension = $size ? get_image_size($size) : '';
        if ($image) {
            $class = $class ? 'class="' . $class . '"' : '';
            if (file_exists(public_path('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention))) {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . $dimension . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            } else {
                return '<img src="' . asset('storage/' . rawurlencode($image->url) . '.' . $image->extention) . '" alt="' . $image->alt . '"' . $class . '>';
            }
        } else {
            return '<img src="' . asset('frontend/assets/images/banner.jpg') . '" alt="Adventure Planner">';
        }
    }
}


if (!function_exists('get_media')) {
    function get_media($id)
    {
        if ($id) {
            return Media::where('id', $id)->first();
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_media_url')) {
    function get_media_url($id)
    {
        if ($id) {
            $media = Media::where('id', $id)->first();
            return $media ? $media->fullurl : Null;
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_image_url')) {
    function get_image_url($id, $size = "")
    {
        if ($id) {
            $media = Media::where('id', $id)->first();
            $dimension = $size ? get_image_size($size) : '';
            if (file_exists(public_path('storage/' . rawurlencode($media->url) . $dimension . '.' . $media->extention))) {
                return asset('storage/' . rawurlencode($media->url) . $dimension . '.' . $media->extention);
            } else {
                return asset('storage/' . rawurlencode($media->url) . '.' . $media->extention);
            }
        } else {
            return Null;
        }
    }
}

if (!function_exists('get_gallery')) {
    function get_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = get_media($new);
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}



if (!function_exists('get_show_gallery')) {
    function get_show_gallery($value)
    {
        if ($value) {
            $value = explode(',', $value);
            foreach ($value as $new) {
                $gallery[]  = $new;
            }
            return $gallery;
        } else {
            return Null;
        }
    }
}

if (!function_exists('fileUpload')) {
    function fileUpload($request, $name, $foldername)
    {
        $image = '';
        if ($image = $request->file($name)) {

            $image = $request->$name;
            $image_new_name = $name . '-' . date('YmdHis') . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('storage/' . $foldername . '/'), $image_new_name);

            $image = '/storage/' . $foldername . '/' . $image_new_name;

            return $image;
        }
    }
}
