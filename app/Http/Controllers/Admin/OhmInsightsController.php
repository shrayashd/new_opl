<?php

namespace App\Http\Controllers\Admin;

use App\Models\OhmInsights;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreGlobalRequest;
use App\Http\Requests\UpdateGlobalRequest;

class OhmInsightsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ebook = OhmInsights::oldest('name')->paginate(20);
        return view('admin.ebook.index', compact('ebook'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.ebook.create');
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
        $input['file'] = fileUpload($request, 'file', 'files');;
        $slug = make_slug($request->name);
        $ebook =  OhmInsights::create($input);
        $ebook->update(['slug' => $slug]);

        return redirect()->route('ebook.edit', $ebook->id)->with('message', 'Created Successfully');
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
    public function edit(OhmInsights $ebook)
    {
        return view('admin.ebook.edit', compact(['ebook']));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateGlobalRequest $request, OhmInsights $ebook)
    {
        $old_file = $ebook->file;
        $input = $request->all();
        $file = fileUpload($request, 'file', 'files');

        if ($file) {
            removeFile($old_file);
            $input['file'] = $file;
        } else {
            unset($input['file']);
        }
        $input['slug'] = $request->slug ? make_slug($request->slug) : make_slug($request->name);
        $ebook->update($input);

        return redirect()->route('ebook.edit', $ebook->id)->with('message', 'Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(OhmInsights $ebook)
    {
        removeFile($ebook->file);
        $ebook->delete();
        return redirect()->route('ebook.index')->with('message', 'Delete Successfully');
    }
}
