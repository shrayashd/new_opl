<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Division;
use App\Models\Product;
use App\Models\ProductBrand;
use App\Models\ProductCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $products = Product::oldest('name')->paginate(20);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('status', 1)->where('parent_id', 0)->get();
        $divisions = Division::where('status', 1)->get();
        $categories = Category::where('status', 1)->where('parent_id', 0)->get();
        $brandProducts = [];
        $categoryProducts = [];
        $divisionProducts = [];
        return view('admin.product.create', compact('brands', 'categories', 'brandProducts', 'categoryProducts', 'divisions', 'divisionProducts'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $product =  Product::create($input);
        $product->update(['slug' => Str::slug($request->name)]);

        $product->brands()->attach($request->brand);
        $product->category()->attach($request->category);

        return redirect()->route('products.edit', $product->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Product $product)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        $brands = Brand::where('status', 1)->where('parent_id', 0)->get();
        $divisions = Division::where('status', 1)->get();
        $categories = Category::where('status', 1)->where('parent_id', 0)->get();
        $brandProducts = ProductBrand::where('product_id', $product->id)->pluck('brand_id')->toArray();

        $categoryProducts = ProductCategory::where('product_id', $product->id)->pluck('category_id')->toArray();
        $divisionProducts = $product->division_id ? [$product->division_id] : [];

        return view('admin.product.edit', compact('product', 'brands', 'categories', 'brandProducts', 'categoryProducts', 'divisions', 'divisionProducts'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Product $product)
    {
        $input = $request->all();

        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $product->update($input);

        $product->brands()->detach();
        $product->brands()->attach($request->brand);
        $product->category()->detach();
        $product->category()->attach($request->category);

        return redirect()->route('products.edit', $product->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();
        $product->brands()->detach();
        $product->category()->detach();
        return redirect()->route('products.index')->with('message', 'Delete Successfully');
    }

    public function repli($pdid)
    {
        $products = Product::find($pdid);
        $productbrands = ProductBrand::where('product_id', $pdid)->get();
        $productcategory = ProductCategory::where('product_id', $pdid)->get();

        $newproduct = $products->replicate();
        $newproduct->save();

        $newproduct->update(['name' => $products->name . '-copy', 'slug' => $products->slug . '-' . $newproduct->id]);

        if ($productcategory) {
            foreach ($productcategory as $rcats) {
                $newcats = $rcats->replicate();
                $newcats->product_id = $newproduct->id;
                $newcats->save();
            }
        }
        if ($productbrands) {
            foreach ($productbrands as $rbrand) {
                $newbrands = $rbrand->replicate();
                $newbrands->product_id = $newproduct->id;
                $newbrands->save();
            }
        }

        return redirect()->route('products.index')->with('message', 'Delete Successfully');
    }
}
