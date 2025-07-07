<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\News;
use App\Models\Page;
use App\Models\Brand;
use App\Models\Popup;
use App\Models\Member;
use App\Models\Review;
use App\Models\Videos;
use App\Models\Partner;
use App\Models\Product;
use App\Models\Sliders;
use App\Models\Category;
use App\Models\Division;
use App\Models\OhmBytes;
use App\Models\Services;
use App\Models\Advertise;
use App\Models\Department;
use App\Models\OhmInsights;
use App\Models\Blogcategory;
use App\Models\OhmSikauchha;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function home()
    {
        //Sliders
        $sliders = Sliders::oldest('order')->get();
        $blogs = News::where('status', 1)->limit(3)->latest()->get();
        $popups = Popup::where('status', 1)->oldest('order')->get();
        $divisions = Division::where('status', 1)->get();

        $adv_top = Advertise::where('status', 1)->whereLocation(1)->oldest('order')->limit(3)->get();
        $adv_single = Advertise::where('status', 1)->whereLocation(2)->oldest('order')->first();
        $adv_bottom_left = Advertise::where('status', 1)->whereLocation(3)->oldest('order')->limit(2)->get();
        $adv_bottom_right = Advertise::where('status', 1)->whereLocation(5)->oldest('order')->limit(2)->get();
        $adv_bottom_center = Advertise::where('status', 1)->whereLocation(4)->oldest('order')->first();

        return view('frontend.home.index', compact(['sliders', 'blogs', 'popups', 'adv_top', 'adv_single', 'adv_bottom_left', 'adv_bottom_right', 'adv_bottom_center', 'divisions']));
    }

    public function pagesingle($slug, Request $request)
    {
        $content = Page::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            if ($content->template == 1) {

                return view('frontend.page.side', compact('content'));
            } elseif ($content->template == 2) {
                $teams = Member::oldest('order')->limit(4)->get();
                $departments = Department::whereStatus(1)->oldest('order')->limit(4)->get();
                return view('frontend.page.about', compact(['content', 'teams', 'departments']));
            } elseif ($content->template == 3) {

                $teams = Member::oldest('order')->get();
                return view('frontend.page.team', compact(['content', 'teams']));
            } elseif ($content->template == 4) {

                $reviews = Review::oldest('order')->get();
                return view('frontend.page.review', compact(['content', 'reviews']));
            } elseif ($content->template == 5) {

                $faqs = Faq::oldest('order')->get();
                return view('frontend.page.faq', compact(['content', 'faqs']));
            } elseif ($content->template == 6) {

                $partners = Partner::where('status', 1)->oldest('order')->get();
                return view('frontend.page.partner', compact(['content', 'partners']));
            } elseif ($content->template == 9) {

                return view('frontend.page.contact', compact('content'));
            } elseif ($content->template == 10) {

                $blogs = News::latest()->get();
                $categorys = Blogcategory::where('status', 1)->where('parent_id', 0)->limit(5)->get();
                return view('frontend.page.blog', compact('content', 'blogs', 'categorys'));
            } elseif ($content->template == 20) {

                $departments = Department::whereStatus(1)->latest()->get();
                return view('frontend.page.departments', compact('content', 'departments'));
            } elseif ($content->template == 11) {

                $services = Services::where('status', 1)->get();
                return view('frontend.page.service', compact(['content', 'services']));
            } elseif ($content->template == 14) {

                $products = Product::where('status', 1)->when(($request->search), function ($query) use ($request) {
                    return $query->where('name', 'LIKE', '%' . $request->search . '%');
                })->when(($request->initial), function ($query) use ($request) {
                    return $query->where('name', 'LIKE', $request->initial . '%');
                })->get();

                $categorys = Category::where('status', 1)->get();
                $brands = Brand::where('status', 1)->get();

                return view('frontend.page.product', compact(['content', 'products', 'categorys', 'brands']));
            } elseif ($content->template == 15) {
                $categorys = Category::where('status', 1)->get();

                return view('frontend.page.category', compact(['content', 'categorys']));
            } elseif ($content->template == 13) {

                return view('frontend.page.booking', compact(['content']));
            } elseif ($content->template == 16) {

                $all_blogs = News::get();
                $all_pages = Page::where('status', 1)->get();
                $all_packs = Product::where('status', 1)->get();
                $all_blog_cats = BlogCategory::where('status', 1)->get();
                $all_servs = Services::where('status', 1)->get();
                $all_cats = Category::where('status', 1)->get();
                $all_brands = Brand::where('status', 1)->get();

                return response()->view('frontend.page.sitemap', compact(['all_blogs', 'all_pages', 'all_cats', 'all_packs', 'all_blog_cats', 'all_servs', 'all_brands']))->header('Content-Type', 'text/xml');
            } elseif ($content->template == 17) {
                $brands = Brand::where('status', 1)->get();

                return view('frontend.page.brand', compact('content', 'brands'));
            } elseif ($content->template == 19) {

                $categorys = BlogCategory::where('status', 1)->where('parent_id', 0)->oldest('order')->paginate(12);
                return view('frontend.page.blogcategory', compact(['content', 'categorys']));
            } elseif ($content->template == 21) {

                return view('frontend.page.gallery', compact(['content']));
            } elseif ($content->template == 22) {

                $videos = Videos::whereStatus(1)->oldest('order')->get();
                return view('frontend.page.video', compact(['content', 'videos']));
            } elseif ($content->template == 23) {

                $ebook = OhmInsights::whereStatus(1)->get();
                return view('frontend.page.ebook', compact(['content', 'ebook']));
            } elseif ($content->template == 24) {

                $bytes = OhmBytes::whereStatus(1)->get();
                return view('frontend.page.byte', compact(['content', 'bytes']));
            } elseif ($content->template == 25) {

                $sikauchha = OhmSikauchha::whereStatus(1)->get();
                return view('frontend.page.sikauchha', compact(['content', 'sikauchha']));
            } elseif ($content->template == 26) {
                $divisions = Division::where('status', 1)->get();

                return view('frontend.page.division', compact(['content', 'divisions']));
            } else {

                $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
                $categorys = Blogcategory::where('status', 1)->limit(5)->get();
                return view('frontend.page.default', compact(['content', 'blogs', 'categorys']));
            }
        } else {
            return view('errors.404');
        }
    }

    public function blogsingle($slug)
    {
        $content = News::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = News::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            $categorys = Blogcategory::where('status', 1)->limit(5)->get();
            return view('frontend.blog.show', compact(['content', 'blogs', 'categorys']));
        } else {
            return view('errors.404');
        }
    }

    public function ebooksingle($slug)
    {
        $content = OhmInsights::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = OhmInsights::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.ebook.show', compact(['content', 'blogs']));
        } else {
            return view('errors.404');
        }
    }

    public function bytesingle($slug)
    {
        $content = OhmBytes::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = OhmBytes::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.byte.show', compact(['content', 'blogs']));
        } else {
            return view('errors.404');
        }
    }

    public function sikauchhasingle($slug)
    {
        $content = OhmSikauchha::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $blogs = OhmSikauchha::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.sikauchha.show', compact(['content', 'blogs']));
        } else {
            return view('errors.404');
        }
    }

    public function departmentsingle($slug)
    {
        $content = Department::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $departments = Department::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.department.show', compact(['content', 'departments']));
        } else {
            return view('errors.404');
        }
    }

    public function servicesingle($slug)
    {
        $content = Services::where('slug', $slug)->where('status', 1)->first();
        if ($content) {
            $services = Services::where('status', 1)->where('id', '!=', $content->id)->limit(5)->get();
            return view('frontend.service.show', compact(['content', 'services']));
        } else {
            return view('errors.404');
        }
    }

    public function productssingle($slug)
    {
        $content = Product::where('slug', $slug)->first();
        if ($content) {
            if ($content->category->isNotEmpty()) {
                $cat = $content->category[0]->id;
                $moreproducts = Product::where('slug', '!=', $slug)->whereHas('category', function ($q) use ($cat) {
                    $q->where('category_id', '=', $cat);
                })->inRandomOrder()->limit(8)->get();
            } else {
                $moreproducts = Product::where('slug', '!=', $slug)->inRandomOrder()->limit(8)->get();
            }
            $categorys = Category::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            return view('frontend.product.show', compact('content', 'moreproducts', 'categorys', 'brands'));
        } else {
            return view('errors.404');
        }
    }

    public function brandsingle($slug, Request $request)
    {
        $content = Brand::where('slug', $slug)->first();
        if ($content) {
            $products = Product::whereHas('brands', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->when(($request->initial), function ($query) use ($request) {
                return $query->where('name', 'LIKE', $request->initial . '%');
            })->paginate(9);
            $categorys = Category::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            return view('frontend.brand.show', compact('products', 'content', 'categorys', 'brands'));
        } else {
            return view('errors.404');
        }
    }

    public function productcategorysingle($slug, Request $request)
    {
        $content = Category::where('slug', $slug)->first();
        if ($content) {
            $products = Product::whereHas('category', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->when(($request->initial), function ($query) use ($request) {
                return $query->where('name', 'LIKE', $request->initial . '%');
            })->paginate(12);
            $categorys = Category::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            return view('frontend.category.show', compact('products', 'content', 'categorys', 'brands'));
        } else {
            return view('errors.404');
        }
    }
    public function divisionsingle($slug, Request $request)
    {
        $content = Division::where('slug', $slug)->first();
        if ($content) {
            $products = Product::whereStatus(1)->where('division_id', $content->id)->when(($request->initial), function ($query) use ($request) {
                return $query->where('name', 'LIKE', $request->initial . '%');
            })->get();
            $categorys = Category::where('status', 1)->get();
            $brands = Brand::where('status', 1)->get();
            return view('frontend.division.show', compact('products', 'content', 'categorys', 'brands'));
        } else {
            return view('errors.404');
        }
    }

    public function categorysingle($slug)
    {
        $content = Blogcategory::where('slug', $slug)->first();
        if ($content) {
            $subcategories = BlogCategory::where('parent_id', $content->id)->oldest('order')->get();
            $blogs = News::whereHas('blogcategory', function ($q) use ($slug) {
                $q->where('slug', '=', $slug);
            })->get();
            return view('frontend.blogcategory.show', compact('content', 'subcategories', 'blogs'));
        } else {
            return view('errors.404');
        }
    }

    public function autocompleteSearch(Request $request)
    {
        $query = $request->get('query');
        $filterResult = Product::where('name', 'LIKE', '%' . $query . '%')->get();
        return response()->json($filterResult);
    }
}
