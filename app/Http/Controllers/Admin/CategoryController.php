<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::where('parent_id', 0)->oldest('name')->paginate(20);
        return view('admin.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categoryParents = [];
        return view('admin.category.create', compact(['categorys', 'categoryParents']));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['parent_id'] = $request->parent_id ?? 0;

        $slug = make_slug($request->name);
        $category = Category::create($input);

        //Unique SLugs
        if (category::where('slug', '=', $slug)->exists()) {
            $input['slug'] = $slug . '-' . $category->id;
        } else {
            $input['slug'] = $slug;
        }

        $category->update($input);

        return redirect()->route('category.edit', $category->id)->with('success', 'New category Created');
    }

    /**
     * Display the specified resource.
     */
    // public function show(Category $category)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        $categorys = Category::where('parent_id', 0)->get();
        $categoryParents = [$category->parent_id];
        return view('admin.category.edit', compact(['category', 'categorys', 'categoryParents']));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGlobalRequest $request, Category $category)
    {
        $input = $request->all();

        //Unique SLugs
        $slug = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        if (Category::where('slug', $slug)->where('id', '!=', $category->id)->exists()) {
            $input['slug'] = $slug . '-' . $category->id;
        } else {
            $input['slug'] = $slug;
        }

        $category->update($input);

        return redirect()->route('category.edit', $category->id)->with('success', 'Category Updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        Category::where('parent_id', $category->id)->update(['status' => 0, 'parent_id' => 0]);
        $category->delete();
        return redirect()->route('category.index')->with('message', 'Delete Successfully');
    }
}
