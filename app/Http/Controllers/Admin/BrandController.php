<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Brand;
use Illuminate\Http\Request;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $brands = Brand::where('parent_id', 0)->oldest('name')->paginate(20);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $brands = Brand::where('parent_id', 0)->get();
        $brandParents = [];
        return view('admin.brand.create', compact(['brands', 'brandParents']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = $request->parent_id ?? 0;

        $slug = make_slug($request->name);
        $brand = Brand::create($input);

        //Unique SLugs
        if (Brand::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $brand->id;
        } else {
            $input['slug'] = $slug;
        }

        $brand->update($input);

        return redirect()->route('brand.edit', $brand->id)->with('success', 'New Brand Created');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Brand $brand)
    // {
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Brand $brand)
    {
        $brands = Brand::where('parent_id', 0)->get();
        $brandParents = [$brand->parent_id];
        return view('admin.brand.edit', compact(['brand', 'brands', 'brandParents']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Brand $brand)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (Brand::where('slug', $slug)->where('id', '!=', $brand->id)->exists()) {
            $input['slug'] = $slug . '-' . $brand->id;
        } else {
            $input['slug'] = $slug;
        }

        $brand->update($input);

        return redirect()->route('brand.edit', $brand->id)->with('success', 'Brand Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Brand $brand)
    {
        Brand::where('parent_id', $brand->id)->update(['status' => 0, 'parent_id' => 0]);
        $brand->delete();
        return redirect()->route('brand.index')->with('message', 'Delete Successfully');
    }
}
