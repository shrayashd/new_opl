<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;
use App\Models\OhmBytes;
use Illuminate\Http\Request;

class OhmBytesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $byte = OhmBytes::oldest('name')->paginate(20);
        return view('admin.bytes.index', compact('byte'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.bytes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreGlobalRequest $request)
    {
        $input = $request->all();
        $input['seo_title'] = $request->seo_title ?? $request->name;
        $slug = make_slug($request->name);
        $byte =  OhmBytes::create($input);
        $byte->update(['slug' => $slug]);

        return redirect()->route('bytes.edit', $byte->id)->with('message', 'Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function show($id)
    // {
    //     //
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(OhmBytes $byte)
    {
        return view('admin.bytes.edit', compact(['byte']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, OhmBytes $byte)
    {
        $input = $request->all();
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $byte->update($input);

        return redirect()->route('bytes.edit', $byte->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OhmBytes $byte)
    {
        $byte->delete();
        return redirect()->route('bytes.index')->with('message', 'Delete Successfully');
    }
}